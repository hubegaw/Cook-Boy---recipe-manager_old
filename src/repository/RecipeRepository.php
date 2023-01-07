<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';

class RecipeRepository extends Repository
{

    public function getRecipe(int $id): ?Recipe
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cookboy.recipes WHERE recipe_id = :recipeID
        ');
        $stmt->bindParam(':recipe_id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$recipe) {
            return null;
        }

        return new Recipe(
            $recipe['title'],
            $recipe['description'],
            $recipe['time'],
            $recipe['portions']
        );
    }

    public function addRecipe(Recipe $recipe): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO recipes (title, description, time, portions, created_by, created_at)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $created_by = 1;
        $created_at = new DateTimeImmutable();

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getTime(),
            $recipe->getPortions(),
            $created_by,
            $created_at->getTimestamp()
        ]);

        //$this->mergeRecipeInfo();
    }

    public function mergeRecipeInfo(): void {
        $ingredientRepository = new IngredientRepository();

        $recipeID = $this->getLastAddedRecipeId();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO recipe_ingredients (recipe_id, ingredient_id, quantity, measure)
            VALUES (?, ?, ?, ?)
        ');

        $name = $_POST['ingredient'];
        $quantity = $_POST['amount'];
        $measure = $_POST['measure'];

        foreach($name as $index => $names) {
            $s_name = $names;
            $s_quantity = $quantity[$index];
            $s_measure = $measure[$index];
            $ingredient = new Ingredient($s_name);
            $ingredientRepository->addIngredient($ingredient);
            $ingredientID = $ingredientRepository->getLastAddedIngredientId();

            $stmt->execute([
                $recipeID,
                $ingredientID,
                $s_quantity,
                $s_measure
            ]);
        }
    }

    private function getLastAddedRecipeId() {
        $stmt = $this->database->connect()->prepare('SELECT MAX(recipe_id) FROM cookboy.recipes');
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        return $recipe['recipe_id'];
    }
}
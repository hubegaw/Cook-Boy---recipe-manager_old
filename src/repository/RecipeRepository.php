<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';

class RecipeRepository extends Repository
{
    private IngredientRepository $ingredient;

    public function getRecipe(Recipe $recipe): ?Recipe
    {
        $ingredients = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipes LEFT JOIN recipe_ingredients ri on recipes.recipe_id = ri.recipe_id
            LEFT JOIN user_recipes ur on recipes.recipe_id = ur.recipe_id
        ');
        $id = $recipe->getRecipeID();
        $stmt->bindParam(':recipe_id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $ingredients[] = $result;
        }

        $recipe->setIngredients($ingredients);

        return $recipe;
    }

    public function getRecipes(): array
    {
        $ingredient = new IngredientRepository();
        $results = [];
        $stmt = $this->database->connect()->prepare('
            SELECT r.recipe_id, r.title, r.description, r.time, r.portions FROM recipes r
                LEFT JOIN user_recipes ur on ur.user_id = :userID
        ');
        $stmt->bindParam(':userID', $_SESSION['user_uuid'], PDO::PARAM_INT);
        $stmt->execute();

        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $ingredients = $ingredient->getIngredients($recipe['recipe_id']);
            $results[] = new Recipe(
                $recipe['recipe_id'],
                $recipe['title'],
                $recipe['description'],
                $recipe['time'],
                $recipe['portions'],
                $ingredients
            );
        }

        return $results;
    }

    public function addRecipe(Recipe $recipe): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.recipes (title, description, time, portions, created_by, created_at)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $created_at = new DateTimeImmutable();

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getTime(),
            $recipe->getPortions(),
            $_SESSION['user_id'],
            $created_at->getTimestamp()
        ]);

        $this->mergeRecipeInfo();
    }

    public function mergeRecipeInfo(): void {
        $ingredientRepository = new IngredientRepository();

        $recipeID = $this->getLastAddedRecipeId();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.recipe_ingredients (recipe_id, ingredient_id, quantity, measure)
            VALUES (?, ?, ?, ?)
        ');

        $name = $_POST['ingredient'];
        $quantity = $_POST['amount'];
        $measure = $_POST['measure'];

        foreach($name as $index => $names) {
            $s_name = $names;
            $s_quantity = $quantity[$index];
            $s_measure = $measure[$index];
            $ingredient = new Ingredient($s_name, $s_quantity, $s_measure);
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
        $stmt = $this->database->connect()->prepare('SELECT MAX(recipe_id) FROM public.recipes');
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        return $recipe['recipe_id'];
    }

    public function getUserRecipesAmount() {
        $stmt = $this->database->connect()->prepare('
            SELECT COUNT(ur.recipe_id) FROM user_recipes ur WHERE ur.user_id = :userID
        ');
        $stmt->bindParam(':userID', $_SESSION['user_uuid'], PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_ASSOC);

        return $count;
    }

}
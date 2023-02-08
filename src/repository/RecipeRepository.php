<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';

class RecipeRepository extends Repository
{
    public function getRecipe(int $recipeID): ?Recipe
    {
        $ingredients = array();
        $recipe = new Recipe($recipeID, null, null, null, null, $ingredients);
        $stmt = $this->database->connect()->prepare('
            SELECT title, description, time, portions FROM public.recipes WHERE recipe_id = :recipe_id
        ');
        $stmt->bindParam(':recipe_id', $recipeID, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        $recipe->setTitle($results['title']);
        $recipe->setDescription($results['description']);
        $recipe->setTime($results['time']);
        $recipe->setPortions($results['portions']);

        $stmt = $this->database->connect()->prepare('
            SELECT name, quantity, measure FROM public.recipe_ingredients 
            LEFT JOIN public.ingredients on recipe_ingredients.ingredient_id = ingredients.ingredient_id
            WHERE recipe_id = :recipe_id
        ');
        $stmt->bindParam(':recipe_id', $recipeID, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $ingredient = new Ingredient($result['name'], $result['quantity'], $result['measure']);
            $ingredients[] = $ingredient;
        }

        $recipe->setIngredients($ingredients);

        return $recipe;
    }

    public function getRecipes(): array
    {
        $ingredient = new IngredientRepository();
        $results = [];
        $stmt = $this->database->connect()->prepare('
            SELECT r.recipe_id, r.title, r.description, r.time, r.portions FROM public.recipes r
            LEFT JOIN user_recipes ur on r.recipe_id = ur.recipe_id WHERE ur.user_id = :userID
        ');

        $stmt->bindParam(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();

        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $results[] = new Recipe(
                $recipe['recipe_id'],
                $recipe['title'],
                $recipe['description'],
                $recipe['time'],
                $recipe['portions'],
                $ingredient->getIngredients($recipe['recipe_id'])
            );

        }

        return $results;
    }

    public function addRecipe(Recipe $recipe): void
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO recipes(title, description, time, portions, created_by, created_at)
            VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
        ');

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getTime(),
            $recipe->getPortions(),
            $_SESSION['user_id'],
        ]);

        $recipeID = $this->getLastAddedRecipeId();

        $this->connectRecipeWithIngredients($recipeID);
        $this->connectRecipeWithUser($recipeID);
    }

    public function deleteRecipe(int $id) {

        $stmt = $this->database->connect()->prepare('
        DELETE FROM user_recipes where user_id = :userID and recipe_id = :recipeID');
        $stmt->bindParam(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':recipeID', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        DELETE FROM recipes where recipe_id = :recipeID');
        $stmt->bindParam(':recipeID', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function searchByTitle(String $searchString) {
        $searchString = '%'.strtolower($searchString).'%';
        $ingredient = new IngredientRepository();
        $results = [];

        $stmt = $this->database->connect()->prepare('
            SELECT r.recipe_id, r.title, r.description, r.time, r.portions FROM public.recipes r
            LEFT JOIN user_recipes ur on r.recipe_id = ur.recipe_id 
             WHERE LOWER(r.title) LIKE :search AND ur.user_id = :userID
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_INT);
        $stmt->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
        $stmt->execute();

        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $results[] = new Recipe(
                $recipe['recipe_id'],
                $recipe['title'],
                $recipe['description'],
                $recipe['time'],
                $recipe['portions'],
                $ingredient->getIngredients($recipe['recipe_id'])
            );
        }

        return $results;
    }

    private function connectRecipeWithIngredients(int $recipeID): void {
        $ingredientRepository = new IngredientRepository();

        $name = $_POST['ingredient'];
        $quantity = $_POST['quantity'];
        $measure = $_POST['measure'];

        foreach($name as $index => $names) {
            $s_quantity = $quantity[$index];
            $ingredient_id = $ingredientRepository->addIngredient($name);

            $stmt = $this->database->connect()->prepare('
            INSERT INTO public.recipe_ingredients (recipe_id, ingredient_id, quantity, measure)
            VALUES (?, ?, ?, ?)
        ');

            $stmt->execute([
                $recipeID,
                $ingredient_id,
                $s_quantity,
                $measure
            ]);
        }
    }

    private function connectRecipeWithUser(int $recipeID) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.user_recipes (user_id, recipe_id)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $_SESSION['user_id'],
            $recipeID
        ]);
}

    private function getLastAddedRecipeId() {

        $stmt = $this->database->connect()->prepare('SELECT MAX(recipe_id) FROM public.recipes');
        $stmt->execute();

        $recipeID = $stmt->fetch(PDO::FETCH_ASSOC);
        return $recipeID['max'];
    }
}
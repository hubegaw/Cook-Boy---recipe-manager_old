<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Ingredient.php';
class IngredientRepository extends Repository
{
    private array $ingredients = [];
    public function getIngredients(int $recipeID, int $ingredientID): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cookboy.recipe_ingredients WHERE recipe_id = :recipeID 
                                                    AND ingredient_id = :ingredientID
        ');
        $stmt->bindParam(':recipeID', $recipeID, PDO::PARAM_INT);
        $stmt->bindParam(':ingredientID', $ingredientID, PDO::PARAM_INT);
        $stmt->execute();

        while($ingredient = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ingredients[] = new Ingredient($ingredient['name']);
        }

        return $ingredients;
    }

    public function addIngredient(Ingredient $ingredient): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO ingredients(name)
            VALUES (?)
        ');

        $stmt->execute([$ingredient->getName()]);
    }

    public function getLastAddedIngredientId() {
        $stmt = $this->database->connect()->prepare('SELECT MAX(ingredient_id) FROM cookboy.ingredients');
        $stmt->execute();

        $ingredient = $stmt->fetch(PDO::FETCH_ASSOC);

        return $ingredient['ingredient_id'];
    }
}
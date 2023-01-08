<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Ingredient.php';
class IngredientRepository extends Repository
{
    private array $ingredients = [];
    public function getIngredients(int $recipeID): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT i.name, ri.quantity, ri.measure FROM recipe_ingredients ri 
                LEFT JOIN ingredients i on i.ingredient_id = ri.ingredient_id
                WHERE recipe_id = :recipeID
        ');
        $stmt->bindParam(':recipeID', $recipeID, PDO::PARAM_INT);
        $stmt->execute();

        while($ingredient = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ingredients[] = new Ingredient($ingredient['name'], $ingredient['quantity'], $ingredient['measure']);
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
        $stmt = $this->database->connect()->prepare('SELECT MAX(ingredient_id) FROM public.ingredients');
        $stmt->execute();

        $ingredient = $stmt->fetch(PDO::FETCH_ASSOC);

        return $ingredient['ingredient_id'];
    }
}
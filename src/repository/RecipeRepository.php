<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';

class RecipeRepository extends Repository
{

    public function getProject(int $id): ?Recipe
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipe WHERE id = :recipeID
        ');
        $stmt->bindParam(':recipeID', $id, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($project == false) {
            return null;
        }

        return new Recipe(
            $project['title'],
            $project['description'],
            $project['ingredients'],
            $project['time'],
            $project['amount']
        );
    }

    public function addProject(Recipe $recipe): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO projects (title, description, time, portions, created_by, created_at)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $created_by = 1;

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getTime(),
            $recipe->getPortions(),
            $created_by
        ]);
    }
}
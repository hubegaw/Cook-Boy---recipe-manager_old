<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';
require_once __DIR__.'/../repository/IngredientRepository.php';

class RecipeController extends AppController {

    private $message = [];
    private $recipeRepository;
    private $ingredientRepository;

    public function __construct()
    {
        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
        $this->ingredientRepository = new IngredientRepository();
    }

    public function add_recipe() {
        if($this->isPost() && $this->validate()) {
            $recipe = new Recipe(null, $_POST['title'], $_POST['description'], $_POST['time'], $_POST['portions'], "");
            $this->recipeRepository->addRecipe($recipe);

            return $this->render("my_recipes", [
                'recipes' => $this->recipeRepository->getRecipes(),
                'messages' => $this->message]);
        }

        return $this->render("add_recipe", ['messages' => $this->message]);
    }

    public function my_recipes() {
        return $this->render("my_recipes", [
            'recipes' => $this->recipeRepository->getRecipes(),
            'messages' => $this->message]);
    }

    private function validate(): bool
    {
        if($_POST['$title'] != null && $_POST['$description'] != null && $_POST['$time'] != null
            && $_POST['$portions'] != null && $_POST['$portions'] > 0) {
            return true;
        }
        return false;
    }
}
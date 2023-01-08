<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';

class RecipeController extends AppController {

    private $message = [];
    private $recipeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
    }

    public function add_recipe() {
        if($this->isPost() && $this->validate()) {
            $recipe = new Recipe(null, $_POST['title'], $_POST['description'], $_POST['time'], $_POST['portions'], "");
            $this->recipeRepository->addRecipeInfo($recipe);

            return $this->render("my_recipes", [
                'recipes' => $this->recipeRepository->getRecipes(1),
                'messages' => $this->message]);
        }

        return $this->render("add_recipe", ['messages' => $this->message]);
    }

    public function my_recipes() {
        return $this->render("my_recipes", [
            'recipes' => $this->recipeRepository->getRecipes(1),
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
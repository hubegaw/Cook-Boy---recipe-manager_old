<?php
require_once 'AppController.php';

class RecipeController extends AppController {

    private $message = [];
    private $recipeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
    }
    public function addRecipe() {
        if($this->isPost() && $this->validate()) {
            $recipe = new Recipe($_POST['title'], $_POST['description'], $_POST['time'], $_POST['portions']);
            $this->recipeRepository->addRecipe($recipe);


            return $this->render("my_recipes", ['messages' => $this->message]);
        }

        return $this->render("add_recipe", ['messages' => $this->message]);
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
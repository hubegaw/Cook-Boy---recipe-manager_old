<?php
require_once 'AppController.php';

class RecipeController extends AppController {

    private $message = [];
    private $title;
    private $description;
    private $ingredients = array();
    private $time;
    private $portions;
    private $recipeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
    }
    public function addRecipe() {
        if($this->isPost() && $this->validate()) {
            $recipe = new Recipe($_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['time'], $_POST['portions']);
            $this->recipeRepository->addProject($recipe);
            return $this->render("my_recipes");
        }

        $this->render("add_recipe");
    }

    private function validate(): bool
    {
        if($_POST['$title'] != null && $_POST['$description'] != null && $_POST['$ingredients'] != null
            && $_POST['$time'] != null && ($_POST['$portions'] != null || $_POST['$portions'] > 0)) {
            return true;
        }
        return false;
    }
}
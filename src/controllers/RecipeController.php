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

    public function addRecipe() {
        if($this->isPost()) {
            if(!$this->validate()) {
                return $this->render("add_recipe", [
                    'measures' => $this->ingredientRepository->getMeasures(),
                    'messages' => "values cannot be empty"]);
            }
            $recipe = new Recipe(0, $_POST['title'], $_POST['description'], $_POST['time'], $_POST['portions'], []);
            $this->recipeRepository->addRecipe($recipe);

            return $this->my_recipes();
        }

        return $this->render("add_recipe", [
            'measures' => $this->ingredientRepository->getMeasures(),
            'messages' => "Recipe added successfully!"]);
    }

    public function my_recipes(string $id=null) {
        if($id) {
            return $this->render("recipe_page",[
                'recipe' => $this->recipeRepository->getRecipe(intval($id))
            ]);
        }
        return $this->render("my_recipes", [
            'recipes' => $this->recipeRepository->getRecipes(),
            'messages' => $this->message]);
    }

    public function deleteRecipe(string $id) {
        var_dump("here");
        $this->recipeRepository->deleteRecipe($id);
        return $this->render("my_recipes", [
            'recipes' => $this->recipeRepository->getRecipes(),
            'messages' => $this->message]);
    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));

            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->recipeRepository->searchByTitle($decoded['search']));
        }
    }

    private function validate(): bool
    {
        foreach ($_POST as $value) {
            if($value == null) return false;
        }
        return true;
    }
}
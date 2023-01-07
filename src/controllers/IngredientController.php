<?php

class IngredientController extends AppController {
    private $ingredientRepository;

    public function __construct()
    {
        parent::__construct();
        $this->ingredientRepository = new IngredientRepository();
    }
    public function addIngredient(Ingredient $ingredient) :void {
        if($this->isPost() && $this->validate()) {
            $this->ingredientRepository->addIngredient($ingredient);
        }
    }

    private function validate(): bool
    {
        if($_POST['$name'] != null) {
            return true;
        }
        return false;
    }
}
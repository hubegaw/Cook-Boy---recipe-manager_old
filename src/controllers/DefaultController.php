<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index()
    {
        $this->render('login');
    }
    public function home()
    {
        $this->render('home');
    }

    public function add_recipe()
    {
        $ingredientRepository = new IngredientRepository();
        $this->render('add_recipe', ['measures' => $ingredientRepository->getMeasures()]);
    }

    public function my_recipes()
    {
        $this->render('my_recipes');
    }

    public function categories()
    {
        $this->render('categories');
    }
}
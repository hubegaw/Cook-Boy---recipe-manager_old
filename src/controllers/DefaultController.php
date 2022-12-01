<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('home');
    }

    public function my_recipes()
    {
        $this->render('my_recipes');
    }
}
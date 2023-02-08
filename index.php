<?php

require 'Routing.php';
session_start();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('my_recipes', 'RecipeController');
Router::get('add_recipe', 'DefaultController');
Router::get('categories', 'DefaultController');
Router::get('deleteRecipe', 'RecipeController');
Router::get('logout', 'SecurityController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('addRecipe', 'RecipeController');
Router::post('search', 'RecipeController');


Router::run($path);
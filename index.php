<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('my_recipes', 'RecipeController');
Router::get('add_recipe', 'RecipeController');
Router::get('categories', 'DefaultController');
Router::post('login', 'SecurityController');

Router::run($path);
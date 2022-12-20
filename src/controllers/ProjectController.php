<?php
require_once 'AppController.php';

class ProjectController extends AppController {
    public function addRecipe() {
        if($this->isPost()) {

            return $this->render("my_recipes");
        }

        $this->render("add_recipe");
    }
}
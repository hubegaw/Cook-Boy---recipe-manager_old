<?php

class Recipe {
    private int $recipeID;
    private string $title;
    private string $description;
    private string $time;
    private string $portions;

    private array $ingredients;

    public function __construct($recipeID, $title, $description, $time, $portions, $ingredients) {
        $this->recipeID = $recipeID;
        $this->title = $title;
        $this->description = $description;
        $this->time = $time;
        $this->portions = $portions;
        $this->ingredients = $ingredients;
    }

    public function getRecipeID(): int
    {
        return $this->recipeID;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle($title): void {
        $this->title = $title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function getTime(): string {
        return $this->time;
    }

    public function setTime($time): void {
        $this->time = $time;
    }

    public function getPortions(): string {
        return $this->portions;
    }

    public function setPortions($portions): void {
        $this->portions = $portions;
    }

    public function getIngredients(): array {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }


}
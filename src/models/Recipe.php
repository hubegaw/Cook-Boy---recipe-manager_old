<?php

class Recipe {
    private string $title;
    private string $description;
    private array $ingredients = array();
    private string $time;
    private string $portions;

    public function __construct($title, $description, $ingredients, $time, $portions) {
        $this->title = $title;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->time = $time;
        $this->portions = $portions;
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

    public function getIngredients(): array {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): void {
        $this->ingredients = $ingredients;
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
}
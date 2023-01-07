<?php

class Recipe {
    private string $title;
    private string $description;
    private string $time;
    private string $portions;

    public function __construct($title, $description, $time, $portions) {
        $this->title = $title;
        $this->description = $description;
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
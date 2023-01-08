<?php

class Ingredient {
    private $name;
    private $quantity;
    private $measure;

    public function __construct($name, $quantity, $measure)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->measure = $measure;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getMeasure()
    {
        return $this->measure;
    }

    public function setMeasure($measure): void
    {
        $this->measure = $measure;
    }

}
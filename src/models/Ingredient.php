<?php

class Ingredient {
    private $name;
    private $amount;
    private $measure;

    public function __construct($name, $amount, $measure) {
        $this->name = $name;
        $this->amount = $amount;
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

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount): void
    {
        $this->amount = $amount;
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
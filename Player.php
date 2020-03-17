<?php


namespace Game;


class Player
{
    private $isStaticMode;
    private $staticValue;
    private $name;
    private $value;

    public function __construct($name, $staticValue = null)
    {
        $this->name = $name;

        if (isset($staticValue)) {
            $this->isStaticMode = true;
            $this->staticValue = $staticValue;
        }

        $this->generateValue();
    }

    public function getName()
    {
        return $this->name;
    }

    public function generateValue()
    {
        if ($this->isStaticMode) {
            $this->value = $this->staticValue;
        } else {
            $this->value = $this->getRandomValue();
        }

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    private function getRandomValue()
    {
        return rand(1, 3);
    }
}
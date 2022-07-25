<?php

class Shield
{
    public int $defense;
    public string $image;

    public function __construct(int $defense = 10, string $image = 'shield.svg')
    {
        $this->defense = $defense;
        $this->image = $image;
    }

    public function getdefense(): int
    {
        return $this->defense;
    }

    public function getImage(): string
    {
        return "assets/images/$this->image";
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function setdefense(int $defense): void
    {
        $this->defense = $defense;
    }

}
<?php

class Weapon
{
    public int $damage;
    public string $image;

    public function __construct(int $damage = 10, string $image = 'sword.svg')
    {
        $this->damage = $damage;
        $this->img = $image;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getImage(): string
    {
        return "assets/images/$this->img";
    }

    public function setImage(string $img): void
    {
        $this->img = $img;
    }

    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

}
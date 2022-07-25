<?php

namespace App;
use App\Fighter;

class Monster extends Fighter
{
    public function __construct(
    string $name,
    int $x,
    int $y,
    int $strength = 10,
    int $dexterity = 5,
    string $image = 'monster.svg'
    )
    {
        parent::__construct($name, $x, $y, $strength, $dexterity, $image);
    }
}
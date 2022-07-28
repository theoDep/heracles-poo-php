<?php

namespace App\Inventory;

class Shovel extends Weapon
{

    public function __construct(int $damage = 2, float $range = 1.5, string $image = 'shovel.svg')
    {
        parent::__construct($damage, $range, $image);
    }
}
<?php

namespace App;
use App\Tile;

class Water extends Tile
{
    public function __construct(int $x, int $y)
    {
        parent::__construct($x, $y, 'water.jpg', false);
    }
}
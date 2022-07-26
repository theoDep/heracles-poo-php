<?php

namespace App;
use App\Tile;

class Grass extends Tile
{
    public function __construct(int $x, int $y)
    {
        parent::__construct($x, $y, 'grass.png');
    }
}
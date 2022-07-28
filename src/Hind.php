<?php

namespace App;

class Hind extends Monster implements Movable
{
    protected string $image = 'hind.svg';
    public function __construct(string $name, int $x, int $y, string $image = 'hind.svg')
    {
        parent::__construct($name, $x, $y, $image);
    }
}
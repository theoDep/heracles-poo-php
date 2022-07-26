<?php

namespace App;

use App\Mappable;

abstract class Tile implements Mappable
{

    private int $x;
    private int $y;
    private string $image;

    public function __construct(int $x, int $y, string $image = '')
    {
        $this->x = $x;
        $this->y = $y;
        $this->image = $image;
    }

    public function getX(): int
    {
        return $this->x;
    }
    public function getY(): int
    {
        return $this->y;
    }
    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }
    public function setX(int $x): void
    {
        $this->x = $x;
    }
    public function setY(int $y): void
    {
        $this->y = $y;
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

}
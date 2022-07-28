<?php

namespace App;

use App\Mappable;

abstract class Tile implements Mappable
{

    private int $x;
    private int $y;
    private string $image;
    private bool $crossable;

    public function __construct(int $x, int $y, string $image = '', $crossable = true)
    {
        $this->x = $x;
        $this->y = $y;
        $this->image = $image;
        $this->crossable = $crossable;
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

    public function isCrossable(Movable $movable): bool
    {
        return $this->crossable;
    }
    public function setCrossable(bool $crossable): void
    {
        $this->crossable = $crossable;
    }

}
<?php

namespace App;

interface Mappable
{
    public function getX(): int;
    public function getY(): int;
    public function getImage(): string;
    public function setX(int $x): void;
    public function setY(int $y): void;
    public function setImage(string $image): void;
}
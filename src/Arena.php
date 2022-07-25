<?php

namespace App;

class Arena
{
    private array $monsters = [];
    private ?Hero $hero = null;
    private int $size = 10;

    public function __construct(Hero $hero, array $monsters)
    {
        $this->hero = $hero;
        $this->monsters = $monsters;
    }

    public function getMonsters(): array
    {
        return $this->monsters;
    }

    public function getHero(): Hero
    {
        return $this->hero;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setMonsters(array $monsters): void
    {
        $this->monsters = $monsters;
    }

    public function setHero(Hero $hero): void
    {
        $this->hero = $hero;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }
    public function getDistance(Fighter $fighter1, Fighter $fighter2): float
    {
        return round(sqrt(pow($fighter1->getX() - $fighter2->getX(), 2) + pow($fighter1->getY() - $fighter2->getY(), 2)), 2);
    }

    public function touchable(Fighter $attacker, Fighter $defender): bool
    {
        return $this->getDistance($attacker, $defender) <= $attacker->getRange();
    }

}
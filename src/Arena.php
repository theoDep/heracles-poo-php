<?php

namespace App;

use Exception;

class Arena

{
    private array $monsters;
    private Hero $hero;

    private int $size = 10;

    public function __construct(Hero $hero, array $monsters)
    {
        $this->hero = $hero;
        $this->monsters = $monsters;
    }

    public function getDistance(Fighter $startFighter, Fighter $endFighter): float
    {
        $Xdistance = $endFighter->getX() - $startFighter->getX();
        $Ydistance = $endFighter->getY() - $startFighter->getY();
        return sqrt($Xdistance ** 2 + $Ydistance ** 2);
    }

    public function touchable(Fighter $attacker, Fighter $defenser): bool
    {
        return $this->getDistance($attacker, $defenser) <= $attacker->getRange();
    }

    /**
     * Get the value of monsters
     */
    public function getMonsters(): array
    {
        return $this->monsters;
    }

    /**
     * Set the value of monsters
     *
     */
    public function setMonsters($monsters): void
    {
        $this->monsters = $monsters;
    }

    /**
     * Get the value of hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * Set the value of hero
     */
    public function setHero($hero): void
    {
        $this->hero = $hero;
    }

    /**
     * Get the value of size
     */
    public function getSize(): int
    {
        return $this->size;
    }

    private function moveAllowed($newPos)
    {
        $monstersPos = array_map(function (Fighter $monster) {
            return ['x' => $monster->getX(), 'y' => $monster->getY()];
        }
                    , $this->monsters);
        $allowed = $newPos['x'] >= 0 && $newPos['x'] < $this->size && $newPos['y'] >= 0 && $newPos['y'] < $this->size && !in_array($newPos, $monstersPos);
        if (!$allowed)
        {
            throw new Exception('Move not allowed');
        }
        else
        {
            return $allowed;
        }
    }

    public function move(Fighter $fighter, string $direction): void
    {
        $currentPos = ['x' => $fighter->getX(), 'y' => $fighter->getY()];
        $newPos = [...$currentPos];

        switch ($direction)
        {
            case 'S':
                $newPos['y']--;
                $this->moveAllowed($newPos) &&
                $fighter->setY($newPos['y']);
                break;
            case 'N':
                $newPos['y']++;
                $this->moveAllowed($newPos) &&
                $fighter->setY($newPos['y']);
                break;
            case 'E':
                $newPos['x']--;
                $this->moveAllowed($newPos) &&
                $fighter->setX($newPos['x']);
                break;
            case 'W':
                $newPos['x']++;
                $this->moveAllowed($newPos) &&
                $fighter->setX($newPos['x']);
                break;
            default:
                throw new Exception('Invalid direction');
        }
    }

    public function battle(int $id): void
    {
        $monster = $this->monsters[$id];

        if ($this->touchable($this->hero, $monster))
        {
            $this->hero->fight($monster);

            if ($monster->isAlive())
            {
                if ($this->touchable($monster, $this->hero))
                {
                    $monster->fight($this->hero);
                }
                else
                {
                    throw new Exception("Monster can't fight back");
                }
            }
            else
            {
                $this->hero->setExperience($this->hero->getExperience() + $monster->getExperience());
                unset($this->monsters[$id]);
                throw new Exception("Monster is dead");
            }
        }
        else
        {
            throw new Exception('Monster is out of range');
        }
    }
}
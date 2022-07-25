<?php

namespace App;
use App\Fighter;

class Hero extends Fighter
{

    private ?Weapon $weapon = null;
    private ?Shield $shield = null;

    public function __construct(string $name,
        int $x,
        int $y,
        int $strength = 10,
        int $dexterity = 5,
        string $image = 'fighter.svg')
    {
        parent::__construct($name, $x, $y, $strength, $dexterity, $image);
    }

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    public function setShield(Shield $shield): void
    {
        $this->shield = $shield;
    }

    public function getDamage(): int
    {
        $damage = $this->getStrength();
        if ($this->getWeapon() !== null)
        {
            $damage += $this->getWeapon()->getDamage();
        }
        return $damage;
    }

    public function getDefense(): int
    {
        $defense = $this->getDexterity();
        if ($this->getShield() !== null)
        {
            $defense += $this->getShield()->getProtection();
        }

        return $defense;
    }

    public function getRange(): float
    {
        $range = $this->range;
        if ($this->getWeapon() !== null)
        {
            $range += $this->getWeapon()->getRange();
        }
        return $range;
    }
}
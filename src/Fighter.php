<?php

declare(strict_types = 1)
;

class Fighter
{
    const MAX_LIFE = 100;

    public string $name;
    public int $strength;
    public int $dexterity;
    public int $life;

    function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->life = self::MAX_LIFE;
    }

    public function fight(Fighter $opponent)
    {
        $damage = rand(1, $this->strength);
        $damage = max(($damage - $opponent->dexterity), 1);
        $opponent->life = max($opponent->life - $damage, 0);
        echo "$this->name 🗡️  $opponent->name 💙 $opponent->name: $opponent->life\n";
    }

    public function isAlive(): bool
    {
        return $this->life > 0;
    }
}
<?php

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;

    private int $strength;
    private int $dexterity;
    private string $image;

    private string $damage;

    private int $life = self::MAX_LIFE;

    private ?Weapon $weapon = null;

    private ?Shield $shield = null;


    public function __construct(
        string $name,
        int $strength = 10,
        int $dexterity = 5,
        string $image = 'fighter.svg'
    )
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->image = $image;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function setShield(Shield $shield): void
    {
        $this->shield = $shield;
    }



    public function fight(Fighter $adversary): void
    {
        $damage = rand(1, $this->getDamage()) - $adversary->getDefense();
        if ($damage < 0)
        {
            $damage = 0;
        }
        $adversary->setLife($adversary->getLife() - $damage);
    }


    /**
     * Get the value of life
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     * @return  self
     */
    public function setLife($life)
    {
        if ($life < 0)
        {
            $life = 0;
        }
        $this->life = $life;

        return $this;
    }

    public function isAlive(): bool
    {
        return $this->getLife() > 0;
    }

    /**
     * Get the value of strength
     */
    public function getStrength()
    {
        return $this->strength;
    }


    /**
     * Set the value of strength
     *
     * @return  self
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get the value of dexterity
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * Set the value of dexterity
     *
     * @return  self
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getDamage(): int
    {
        $damage = $this->getStrength();

        if (isset($this->weapon))
        {
            $damage += $this->weapon->getDamage();
        }

        return $damage;
    }

    public function getDefense(): int
    {
        $defense = $this->getDexterity();

        if (isset($this->shield))
        {
            $defense += $this->shield->getDefense();
        }

        return $defense;
    }
}
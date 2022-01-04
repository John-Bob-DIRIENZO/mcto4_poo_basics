<?php

namespace App\Classe;

use App\Interface\Destructible;
use App\Interface\Movable;

abstract class Perso implements Movable, Destructible
{
    protected int $force;
    protected int $degats;

    protected static int $instances = 0;

    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 100;

    abstract public function parle(): string;

    final public function test()
    {
        return 'je suis une métode finale';
    }

    public function __construct(int $force, int $degats = 0)
    {
        $this->setForce($force);
        $this->degats = $degats;

        self::$instances += 1;
    }

    public static function getInstances()
    {
        return self::$instances;
    }

    public function isBroken(): bool
    {
        return $this->degats >= 100;
    }

    public function frapper(Destructible $perso)
    {
        if ($perso->isBroken()) {
            return 'il est mort';
        }

        return 'il est pas mort';
    }

    public function getDegats(): int
    {
        return $this->degats;
    }

    /**
     * @param int $force
     */
    public function setForce(int $force): void
    {
        if (!in_array($force, [self::FORCE_GRANDE, self::FORCE_MOYENNE, self::FORCE_PETITE])) {
            throw new \InvalidArgumentException('bof...');
        }

        $this->force = $force;
    }
}
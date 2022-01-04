<?php

namespace App\Classe;

final class Magicien extends Perso
{
    public function __construct(int $force, int $degats = 0)
    {
        parent::__construct($force, $degats);
        echo 'je suis instancié <br>';
    }

    public function parle(): string
    {
        return 'je suis un truc';
    }

    public function move($lieu)
    {
        // TODO: Implement move() method.
    }
}
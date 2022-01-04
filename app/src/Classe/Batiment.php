<?php

namespace App\Classe;

use App\Trait\hasFenetre;
use App\Trait\hasPorte;

class Batiment
{
    use hasFenetre, hasPorte;

    public function ouvrirPorte()
    {
        return 'porte ouverte dans le batiment';
    }
}
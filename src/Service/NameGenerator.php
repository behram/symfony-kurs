<?php

namespace App\Service;

class NameGenerator
{
    public function randomName()
    {
        $names = [
            'Behram',
            'Selim',
            'Ayşe',
            'Zeynep',
        ];

        $index = array_rand($names);

        return $names[$index];
    }
}
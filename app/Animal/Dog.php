<?php

declare(strict_types=1);

namespace App\Animal;

class Dog implements AnimalInterface
{
    public function call(): void
    {
        echo 'Au au au';
    }
}
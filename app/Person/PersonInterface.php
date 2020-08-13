<?php

namespace App\Person;

use App\Animal\AnimalInterface;

interface PersonInterface
{
    /**
     * @return string
     */
    public function getName(): string;
}
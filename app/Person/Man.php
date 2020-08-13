<?php

declare(strict_types=1);

namespace App\Person;

use App\Animal\AnimalInterface;

class Man implements PersonInterface
{
    /** @var AnimalInterface $animal */
    private $animal;

    /** @var string $name */
    private $name;

    /**
     * Man constructor.
     * @param AnimalInterface $animal
     * @param string $name
     */
    public function __construct(AnimalInterface $animal, string $name)
    {
        $this->animal = $animal;
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getAnimal(): AnimalInterface
    {
        return $this->animal;
    }
}
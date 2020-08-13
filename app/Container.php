<?php

declare(strict_types=1);

namespace App;

class Container
{
    /**
     * @var array $preferenceMap
     */
    private $preferenceMap = [];

    public function __construct(array $preferenceMap)
    {
        $this->preferenceMap = $preferenceMap;
    }

    /**
     *
     * Returns an instance for given $className
     *
     * @param string $className
     * @param array $bindParameters
     */
    public function get(string $className, array $bindParameters = [])
    {
        $reflection = new \ReflectionClass($className);
        $params = [];
        if ($reflection->getConstructor()) {
            $constructorParams = $reflection->getConstructor()->getParameters();
            foreach ($constructorParams as $param) {
                $paramName = $param->getName();
                if ($param->getClass()) {
                    $class = $this->preferenceMap[$param->getClass()->getName()] ?? $param->getClass()->getName();
                    $params[] = $this->get($class);
                    continue;
                }

                $bindValue = $bindParameters[$paramName] ?? null;
                if ($bindValue === null && !$param->isDefaultValueAvailable()) {
                    trigger_error("Param '{$paramName}' doesn't have a default value for class {$className}", E_USER_ERROR);
                }
                $params[] = $bindValue;
            }
        }
        return new $className(...$params);
    }
}
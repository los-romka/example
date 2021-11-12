<?php

declare(strict_types=1);

namespace App\Locator;

class ServiceLocator
{
    private array $serviceLocator = [];

    public function get(string $key)
    {
        if (is_callable($this->serviceLocator[$key])) {
            $this->serviceLocator[$key] = $this->serviceLocator[$key]($this);
        }

        return $this->serviceLocator[$key];
    }

    public function set(string $key, $service): void
    {
        $this->serviceLocator[$key] = $service;
    }
}

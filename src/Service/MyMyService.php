<?php

declare(strict_types=1);

namespace App\Service;

class MyMyService
{
    private MyCustomService $service;

    public function __construct(MyCustomService $service)
    {
        $this->service = $service;
    }

    public function show(): int
    {
        return $this->service->sum(0, 0, 1);
    }
}

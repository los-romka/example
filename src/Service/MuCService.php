<?php

declare(strict_types=1);

namespace App\Service;

class MuCService
{
    private MyCustomService $service;

    public function __construct(MyCustomService $service)
    {
        $this->service = $service;
    }

    public function f(): string
    {
        return $this->service->env();
    }
}

<?php

declare(strict_types=1);

namespace App\Service;

class MyCustomService
{
    private string $appEnv;
    private string $customEnv;

    public function __construct(string $appEnv, string $customEnv)
    {
        $this->appEnv = $appEnv;
        $this->customEnv = $customEnv;
    }

    public function sum(int $a, int $b, int $c): int
    {
        if ($this->appEnv === 'prod') {
            return $a + $b + $c;
        }

        return 17;
    }

    public function env(): string
    {
        return $this->appEnv;
    }

    public function custom(): string
    {
        return $this->customEnv;
    }
}

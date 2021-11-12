<?php

declare(strict_types=1);

namespace App\Service;

class CalculatorV2 implements CalculatorInterface
{
    public function f(): string
    {
        return 'v2';
    }
}

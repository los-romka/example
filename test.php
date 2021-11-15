<?php

declare(strict_types=1);

use App\Locator\ServiceLocator;

require_once __DIR__ . '/vendor/autoload.php';

$serviceLocator = new ServiceLocator();
$serviceLocator->set('service', new \App\Service\MyCustomService((string)$_ENV['APP_ENV'], (string)$_ENV['MY_CUSTOM_ENV']));

$serviceLocator->set(
    \App\Controller\HomeController::class,
    function($serviceLocator) {
        return new \App\Controller\HomeController(
            new \App\Service\MyMyService(
                $serviceLocator->get('service')
            ),
            new \App\Service\CalculatorV2()
        );
    }
);

$serviceLocator->set(
    \App\Controller\DeliciousPuppyController::class,
    new \App\Controller\DeliciousPuppyController(
        $serviceLocator->get('service'),
        new \App\Service\CalculatorV2()
    )
);

$serviceLocator->set(
    \App\Service\MuCService::class,
    function($serviceLocator) {
        return new \App\Service\MuCService(
            $serviceLocator->get('service')
        );
    }
);

<?php

namespace App\Controller;

use App\Service\CalculatorInterface;
use App\Service\MyCustomService;
use App\Service\MyMyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private MyMyService $service;
    private CalculatorInterface $calculator;

    public function __construct(MyMyService $service, CalculatorInterface $calculator)
    {
        $this->service = $service;
        $this->calculator = $calculator;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // как здесь постучаться в кастомный облачный сервис с заранее сконфигурированным хостом
        return $this->json([
            'message' => 'Hello world',
            'my_custom' => $this->service->show(),
            'calc' => $this->calculator->f(),
        ]);
    }
}

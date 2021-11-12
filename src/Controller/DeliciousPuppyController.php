<?php

namespace App\Controller;

use App\Service\CalculatorInterface;
use App\Service\MyCustomService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeliciousPuppyController extends AbstractController
{
    private MyCustomService $service;
    private CalculatorInterface $calculator;

    public function __construct(MyCustomService $service, CalculatorInterface $calculator)
    {
        $this->service = $service;
        $this->calculator = $calculator;
    }

    /**
     * @Route("/1", name="delicious_puppy")
     */
    public function index(): Response
    {
        return $this->json([
            'controller' => 'delicious_puppy',
            'my_custom' => $this->service->sum(1, 2, 3),
            'calc' => $this->calculator->f(),
            'env' => $this->service->env(),
            'custom_env' => $this->service->custom(),
        ]);
    }
}

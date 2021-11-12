<?php

namespace App\Controller;

use App\Service\MyCustomService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TinyPopsicleController extends AbstractController
{
    private MyCustomService $service;

    public function __construct(MyCustomService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/2", name="tiny_popsicle")
     */
    public function index(): Response
    {
        return $this->json([
            'controller' => 'tiny_popsicle',
            'my_custom' => $this->service->sum(1, 2, 3)
        ]);
    }
}

<?php

namespace App\Controller;

use App\Service\CurrencyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        $currencyService = new CurrencyService();
        $euro =   $currencyService->getCoinToBRL("EUR-BRL");
        $bitcoin =   $currencyService->getCoinToBRL("BTC-BRL");
        $dolar  = $currencyService->getCoinToBRL("USD-BRL");

        return $this->render('index/dashboard.html.twig', [
            'euro_to_brl' => $euro,
            'btc_to_brl' => $bitcoin,
            'usd_to_brl'=> $dolar
        ]);
    }
}

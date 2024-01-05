<?php

namespace App\Controller;

use App\Repository\TotalRepository;
use App\Service\CurrencyService;
use App\Service\EmailService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    #[Route('/', name: 'app_index')]
    public function index(SessionInterface $session): Response
    {
        if(($valid = $this->validSession($session)) === false) {
            return $this->render('index/index.html.twig',['path' => $this->getPathEnv()]);
        }else{
            return $this->redirectToRoute('app_dashboard');
        }
    }

    #[Route('/mail', name: 'app_index_mail')]
    public function mail(MailerInterface $mailer): Response
    {
       $emailService = new EmailService($mailer);

       $emailService->sendMail();

        return $this->redirectToRoute('app_dashboard');
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(SessionInterface $session, TotalRepository $totalRepository): Response
    {
        if(($valid = $this->validSession($session)) === false) {
            return $this->render('index/index.html.twig',['path' => $this->getPathEnv()]);
        }

        $currencyService = new CurrencyService();
        $euro =   $currencyService->getCoinToBRL("EUR-BRL");
        $bitcoin =   $currencyService->getCoinToBRL("BTC-BRL");
        $dolar  = $currencyService->getCoinToBRL("USD-BRL");

        $CPTS11 = $currencyService->getFii('CPTS11');

        $total =  $totalRepository->findAll();

        return $this->render('index/dashboard.html.twig', [
            'euro_to_brl' => $euro,
            'btc_to_brl' => $bitcoin,
            'usd_to_brl'=> $dolar,
            'session'=>$this->sessionDTO,
            'path' => $this->getPathEnv(),
            'total'=> $total[0]->getAmount(),
            'fii'=> $CPTS11
        ]);
    }
}

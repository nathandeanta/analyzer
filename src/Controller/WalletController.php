<?php

namespace App\Controller;


use App\Repository\WalletRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class WalletController extends Controller
{
    #[Route('/wallet', name: 'app_wallet')]
    public function index(SessionInterface $session, WalletRepository $walletRepository): Response
    {
        if(($valid = $this->validSession($session)) === false) {
            return $this->render('index/index.html.twig',[ 'path' => $this->getPathEnv(),]);
        }

       $list = $walletRepository->findAll();

        $totalAmount = 0;
       if($list) {

           foreach ($list as $wallet) {
               $totalAmount += floatval($wallet->getAmount());
           }
       }

        return $this->render('wallet/index.html.twig', [
            'title'=> "List Wallet",
            'object'=> "List Wallet",
            'session'=> $this->sessionDTO,
            'path' => $this->getPathEnv(),
            'list' => $walletRepository->findAll(),
            'total'=> $totalAmount
        ]);
    }
}

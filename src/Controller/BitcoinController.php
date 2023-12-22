<?php

namespace App\Controller;

use App\Entity\Bitcoin;
use App\Entity\Ticker;
use App\Repository\BitcoinRepository;
use App\Repository\TickerRepository;
use DateTime;
use Doctrine\DBAL\Driver\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class BitcoinController extends Controller
{
    #[Route('/bitcoinList', name: 'app_bitcoin')]
    public function index(SessionInterface $session, BitcoinRepository $bitcoinRepository): Response
    {

        if(($valid = $this->validSession($session)) === false) {
            return $this->render('index/index.html.twig',[ 'path' => $this->getPathEnv(),]);
        }

        return $this->render('bitcoin/index.html.twig', [
            'path' => $this->getPathEnv(),
            'object'=> "Coin",
            'list'=> $bitcoinRepository->findAll(),
            'session'=> $this->sessionDTO,
            'title'=> 'List of Coins',
        ]);
    }

    #[Route('/tickerList/{id_bitcoin}', name: 'app_bitcoin_list_ticker')]
    public function listTicker(SessionInterface $session, int $id_bitcoin, BitcoinRepository $bitcoinRepository, TickerRepository $tickerRepository): Response
    {

        if(($valid = $this->validSession($session)) === false) {
            return $this->render('index/index.html.twig',[ 'path' => $this->getPathEnv(),]);
        }

        $bitcoin  = $bitcoinRepository->find($id_bitcoin);

        return $this->render('bitcoin/ticker.html.twig', [
            'path' => $this->getPathEnv(),
            'object'=> "Ticker",
            'list'=> $tickerRepository->findBy(["bitcoin"=> $bitcoin],["date_real"=> 'DESC']),
            'session'=> $this->sessionDTO,
            'title'=> 'List of Ticker',
        ]);
    }


    #[Route('/symbols', name: 'app_bitcoin_symbol')]
    public function symbols(EntityManagerInterface $entityManager): Response
    {

        die("stop");

        $datas = file_get_contents("https://api.mercadobitcoin.net/api/v4/symbols");

        $dados = json_decode($datas,true);


        $dadosPersistencia = [];

        // Iteramos pelos índices
        for ($i = 0; $i < count($dados["symbol"]); $i++) {
            // Iteramos pelas chaves
            foreach (array_keys($dados) as $chave) {
                // Criamos o array persistido se ainda não existir
                if (!isset($dadosPersistencia[$i])) {
                    $dadosPersistencia[$i] = [];
                }

                // Adicionamos o valor ao array persistido
                $dadosPersistencia[$i][$chave] = $dados[$chave][$i];
            }
        }


        foreach ($dadosPersistencia as $item) {

            $bitcoin = new Bitcoin();
            $bitcoin->build($item);

            $entityManager->persist($bitcoin);

        }

        $entityManager->flush();
    }

    #[Route('/ticker', name: 'app_bitcoin_ticker')]
    public function ticker(BitcoinRepository $bitcoinRepository, EntityManagerInterface $entityManager)
    {

        try {

            $list = $bitcoinRepository->findBy(["ticker" => '1']);

            foreach ($list as $item) {

                $response = file_get_contents("https://api.mercadobitcoin.net/api/v4/tickers?symbols=" . $item->getSymbol());

                $data = json_decode($response, true);

                if (!isset($data[0]["buy"])) {
                    continue;
                }

                $data = $data[0];

                $ticker = new Ticker();
                $ticker->setBitcoin($item);
                $ticker->setBuy($data["buy"]);
                $ticker->setHigh($data["high"]);
                $ticker->setLast($data["last"]);
                $ticker->setLow($data["low"]);
                $ticker->setOpen($data["open"]);
                $ticker->setPair($data["pair"]);
                $ticker->setSell($data["sell"]);
                $ticker->setVol($data["vol"]);
                $ticker->setDate($data["date"]);

                $dateTime = new DateTime();
                $dateTime->setTimestamp($data["date"]);

                $ticker->setDateReal($dateTime);

                $entityManager->persist($ticker);
                $entityManager->flush();
            }



            return $this->redirectToRoute('app_bitcoin');
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

<?php

namespace App\Controller;

use App\Entity\InvestmentEntity;
use App\Repository\InvestmentEntityRepository;
use App\Repository\TotalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvestmentController extends AbstractController
{
    #[Route('/investment/register', name: 'app_invest_register_view')]
    public function index(): Response
    {
        return $this->render('investment/register.html.twig', [
            'controller_name' => 'InvestmentController',
            'title'=> "Register entry"
        ]);
    }

    #[Route('/investment/list', name: 'app_invest_list', methods: ["GET"])]
    public function list(InvestmentEntityRepository $investmentEntityRepository, TotalRepository $totalRepository): Response
    {
        $list = $investmentEntityRepository->findBy([], ['date' => 'DESC']);

        $total = $totalRepository->findAll();

        return $this->render('investment/index.html.twig', [
            'title'=> "List Investments",
            'investments'=> $list,
            'total'=> $total[0]->getAmount()
        ]);
    }

    #[Route('/investment/list/filter', name: 'app_investment_filter', methods:["POST", "GET"])]
    public function getAllFilter(Request $request, InvestmentEntityRepository $investmentEntityRepository,
                                 TotalRepository $totalRepository): Response
    {

        if ($request->isMethod('POST')) {

            $bank = $request->request->get("bank");
            $search = $request->request->get("search");
            $start = $request->request->get("start");
            $end = $request->request->get("end") ?? date("Y-m-d");
            $type = $request->request->get("type");

            $list = $investmentEntityRepository->filter($bank, $search, $start, $end, $type);

            $total = $totalRepository->findAll();

            return $this->render('investment/index.html.twig', [
                'investments' => $list,
                'total'=>  $total[0]->getAmount(),
                "bank"=> $bank,
                "search"=>$search,
                "start"=> $start,
                "end"=>$end,
                "type"=>$type,
                "title"=> "List Investments"
            ]);

        }

        return $this->redirectToRoute('app_invest_list');

    }

    #[Route('/investment/delete/{id}', name: 'delete_investment', methods:["GET"])]
    public function deleteCashFlow(Request $request, InvestmentEntityRepository $investmentEntityRepository, int $id, EntityManagerInterface $entityManager): Response
    {
        $investment = $investmentEntityRepository->find($id);

        if (!$investment) {
            throw $this->createNotFoundException('not found');
        }

        $entityManager->remove($investment);
        $entityManager->flush();

        return $this->redirectToRoute('app_invest_list');
    }

    #[Route('/investment/create', name: 'app_investment_create', methods: ["POST"])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {

        if ($request->isMethod('POST')) {

            $description = $request->request->get('description');
            $amount = $request->request->get('amount');
            $type = $request->request->get('type');
            $date = $request->request->get('date');
            $bank = $request->request->get('bank');
            $tax = $request->request->get('tax');

            $investment = new InvestmentEntity();
            $investment->setAmount($amount);
            $investment->setTax($tax);
            $investment->setType($type);
            $investment->setBank($bank);
            $investment->setDate(new \DateTime($date));
            $investment->setCreatedAt(new \DateTime());
            $investment->setDescription($description);

            $entityManager->persist($investment);
            $entityManager->flush();

            return $this->redirectToRoute('app_invest_register_view');
        }

        return $this->render('investment/register.html.twig',["title"=> "Register entry"]);
    }
}
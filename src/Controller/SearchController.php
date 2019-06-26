<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\Repository\CompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
//    public function index(Request $request, CompteRepository $compteRepository)
//    {
//        $comptes = [];
//        $form = $this->createForm(SearchFormType::class);
//        if($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
//            $dataSearch = $form->getData();
//            $comptes = $compteRepository->findCompte($dataSearch);
//        }
//        return $this->render('search/index.html.twig', [
//            'formSearch' => $form->createView(),
//            'comptes' => $comptes,
//            'errors' => $form->getErrors()
//        ]);
//    }
}

<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Repository\GestionnaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", requirements={"home"="^(?!register).+"})
     */

    public function ListeComptes()
    {
        $repository = $this->getDoctrine()->getRepository(Compte::class);
        $comptes=$repository->findAll();
        return $this->render('home/index.html.twig', [
            'comptes' => $comptes
        ]);
    }
//    public function ListeComptes(GestionnaireRepository $gestionnaire_repo)
//    {
//        $gestionnaire = $gestionnaire_repo->findOneById($this->getUser()->getId());
//        $comptes =$gestionnaire->getComptes();
//        return $this->render('home/index.html.twig', [
//            'comptes' => $comptes
//        ]);
//    }



}

<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Compte;
use App\Entity\Gestionnaire;
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

    public function ListeCategorie()
    {
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $categories=$repository->findAll();
        return $this->render('home/index.html.twig', [
            'categories' => $categories
        ]);
    }


//    /**
//     * @Route("/categorie", name="categorie", requirements={"categorie"="^(?!register).+"})
//     */
//
//    public function ListeCategorie()
//    {
//        $repository = $this->getDoctrine()->getRepository(Categorie::class);
//        $categories=$repository->findAll();
//        return $this->render('home/index.html.twig', [
//            'categories' => $categories
//        ]);
//    }
//
//


}

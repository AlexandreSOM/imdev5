<?php

namespace App\Controller;

use App\Entity\Category;
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


    /**
     * @Route("/mescomptes", name="mescomptes", requirements={"home"="^(?!register).+"})
     */

    public function listeCompteBy()
    {
        // Recuperer l'id de l'utilisateur connecté
        $userConnected = $this->get('security.token_storage')
            ->getToken()
            ->getUser();

        //Recuperer les comptes de l'utilisateur connecté
        $comptes = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Compte::class)
            ->findBy(
                ['gestionnaire' => $userConnected->getId()]
            );

        return $this->render('gestionnaire/mescomptes.html.twig', [
            'comptes' => $comptes
        ]);
    }

    /**
     * @Route("/category", name="category", requirements={"category"="^(?!register).+"})
     */

    public function ListeCategory()
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $categorys=$repository->findAll();
        return $this->render('category/index.html.twig', [
            'categorys' => $categorys
        ]);
    }
}

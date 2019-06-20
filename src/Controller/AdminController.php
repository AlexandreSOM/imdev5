<?php

namespace App\Controller;

use App\Entity\Gestionnaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function listeGestionnaire()
    {
        $repository = $this->getDoctrine()->getRepository(Gestionnaire::class);
        $gestionnaires=$repository->findAll();
        return $this->render('admin/index.html.twig', [
            'gestionnaires' => $gestionnaires
        ]);
    }


}

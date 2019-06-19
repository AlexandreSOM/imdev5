<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{


    /**
     * @Route("/compte/ajout", name="compte-ajout")
     * @Route("detail/{compte}/modifier", name="compte-modifier")
     */
    public function form(Request $request, Compte $compte = null)
    {
        if(!$compte){
            $compte = new Compte();
        }
        $form = $this->createForm(CompteFormType::class, $compte);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $compte = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($compte);
            $em->flush();
            $this->addFlash('success', "Edition du compte avec succès !");
            return $this->redirectToRoute('home');
        } else {
            return $this->render('compte/edit-compte.html.twig', [
                'form' => $form->createView(), 'errors' => $form->getErrors()
            ]);

        }
    }

    /**
     * @Route("/remove-compte/{compte}", name="remove-compte")
     */
    public
    function removeCompte(Compte $compte)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($compte);
        $em->flush();
        $this->addFlash('success', 'Ce compte vient d\'être supprimé avec succès !');
        return $this->redirectToRoute('home');
    }
}

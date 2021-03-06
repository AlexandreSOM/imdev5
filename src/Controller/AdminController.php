<?php

namespace App\Controller;

use App\Entity\Gestionnaire;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/gestionnaire", name="gestionnaire")
     */
    public function listeGestionnaire()
    {
        $repository = $this->getDoctrine()->getRepository(Gestionnaire::class);
        $gestionnaires=$repository->findAll();
        return $this->render('admin/index.html.twig', [
            'gestionnaires' => $gestionnaires
        ]);
    }
    /**
     * @Route("detail/{gestionnaire}/modifier", name="gestionnaire-modifier", requirements={"gestionnaire-ajout"="^(?!register).+"})
     */
    public function form(Request $request)
    {
//        if(!$gestionnaire){
//            $gestionnaire = new Gestionnaire();
//        }
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $gestionnaire = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($gestionnaire);
            $em->flush();
            $this->addFlash('success', "Edition du gestionnaire avec succès !");
            return $this->redirectToRoute('admin');
        } else {
            return $this->render('admin/edit-admin.html.twig', [
                'registrationForm' => $form->createView(), 'errors' => $form->getErrors()
            ]);

        }
    }



    /**
     * @Route("/admin/remove-gestionnaire/{gestionnaire}", name="remove-gestionnaire", requirements={"remove-gestionnaire"="^(?!register).+"})
     */
    public function removeAdmin(Gestionnaire $gestionnaire)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($gestionnaire);
        $em->flush();
        $this->addFlash('success', 'Ce gestionnaire vient d\'être supprimé avec succès !');
        return $this->redirectToRoute('admin');
    }

}

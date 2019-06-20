<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
//    /**
//     * @Route("/search", name="search")
//     */
//    public function index()
//    {
//        return $this->render('search/index.html.twig', [
//            'controller_name' => 'SearchController',
//        ]);
//    }

    /**
     * @Route("compte/search", name="search-compte")
     */
    public function searchCompte(Request $request)
    {
        $form = $this->createFormBuilder(null)
                ->add('query', TextType::class)
                ->add('search', SubmitType::class)

            ->getForm()
        ;

        return $this->render('search/index.html.twig', [
            'formSearch' => $form->createView()
            ]);
    }
}

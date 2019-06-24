<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    /**
     * @Route("/category/ajout", name="category-ajout", requirements={"category-ajout"="^(?!register).+"})
     * @Route("detail/{category}/modifier", name="category-modifier", requirements={"category-modifier"="^(?!register).+"})
     */

    public function formCategory(Request $request, Category $category = null )
    {

        if(!$category){
            $category = new Category();
        }

        $form = $this->createForm(CategoryFormType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $this->addFlash('success', "Edition du category avec succès !");
            return $this->redirectToRoute('category');
        } else {
            return $this->render('category/edit-category.html.twig', [
                'formCategory' => $form->createView(),
                'errors' => $form->getErrors()
            ]);

        }
    }

    /**
     * @Route("/remove-category/{category}", name="remove-category", requirements={"remove-category"="^(?!register).+"})
     */
    public function removeCategory(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();
        $this->addFlash('success', 'Ce category vient d\'être supprimé avec succès !');
        return $this->redirectToRoute('category');
    }
}

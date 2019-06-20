<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Httpfoundation\Response;
use App\Entity\Personne;
use App\Form\PersonneType;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="personne")
     */
    public function createAction(Request $request)
    {
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($personne);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "L'étudiant a été ajouté avec succès.");
        }

        return $this->render('personne/createPersonne.html.twig', [
            'controller_name' => 'PersonneController',
            'formPersonne' =>$form->createView()
        ]);
    }
}

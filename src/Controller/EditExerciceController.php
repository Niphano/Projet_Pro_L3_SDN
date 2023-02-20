<?php

namespace App\Controller;

use App\Entity\Exercices;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditExerciceController extends AbstractController
{
    /**
     * @Route("/edit/exercice", name="app_edit_exercice")
     */
    public function index(Request $request, Exercices $exercice, EntityManagerInterface $entityManager): Response
    {
        $data=$request->request->all();
        if (count($data)){
            $exercice->setTitle($data["title"]);
            $exercice->setEnonce($data["enonce"]);
            $exercice->setResultat($data["resultat"]);
            $entityManager->persist($exercice);
            $entityManager->flush();
        }
        return $this->render('edit_exercice/index.html.twig', [
            'controller_name' => 'EditExerciceController',
        ]);
    }
}

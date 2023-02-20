<?php

namespace App\Controller;

use App\Entity\Exercices;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutExerciceController extends AbstractController
{
    /**
     * @Route("/ajout/exercice", name="app_ajout_exercice")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $exercice = new Exercices();
        $data=$request->request->all();
        if (count($data)){
            $exercice->setTitle($data["title"]);
            $exercice->setEnonce($data["enonce"]);
            $exercice->setResultat($data["resultat"]);
            $exercice->setCreatedAt($data["date_de_creation"]);
            $entityManager->persist($exercice);
            $entityManager->flush();
        }


        return $this->render('ajout_exercice/index.html.twig', [
            'controller_name' => 'AjoutExerciceController',
        ]);
    }
}

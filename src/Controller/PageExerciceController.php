<?php

namespace App\Controller;

use App\Entity\Exercices;
use App\Entity\LanguageCategory;
use App\Entity\ThematiqueCategory;
use App\Repository\ExercicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageExerciceController extends AbstractController
{
    /**
     * @Route("/page/exercice", name="app_page_exercice")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $exercices = $em->getRepository(Exercices::class)->findAll();

        return $this->render('page_exercice/index.html.twig', [
            'controller_name' => 'PageExerciceController',
            'exercices' => $exercices,
        ]);
    }
/*
    /**
     * @Route("/page/exercice/filter", name="app_page_exercice_filter")
     */
    /*
    public function filter(Request $request, ExercicesRepository $exercicesRepository, EntityManagerInterface $em): Response
    {
        $languageCategory = $request->request->get('languageCategory');
        $thematiqueCategory = $request->request->get('thematiqueCategory');
        $exercices = $exercicesRepository->findByCategory($languageCategory, $thematiqueCategory);
        $languageCategories = $em->getRepository(LanguageCategory::class)->findAll();
        $thematiqueCategories = $em->getRepository(ThematiqueCategory::class)->findAll();
        if (isset($languageCategories) && isset($thematiqueCategories)) {
            return $this->render('page_exercice/index.html.twig', [
                'exercices' => $exercices,
                'languageCategories' => $languageCategories,
                'thematiqueCategories' => $thematiqueCategories
            ]);
        }
    }*/


}

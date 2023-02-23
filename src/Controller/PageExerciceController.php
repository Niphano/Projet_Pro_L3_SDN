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
    /*
    public function index(Request $request, ExercicesRepository $exercicesRepository, EntityManagerInterface $em): Response
    {
        $exercices = $em->getRepository(Exercices::class)->findAll();
        $languageCategoryId = $request->request->get('languageCategory');
        $thematiqueCategoryId = $request->request->get('thematiqueCategory');

        $languageCategory = null;
        $thematiqueCategory = null;

        if ($languageCategoryId) {
            $languageCategory = $em->getRepository(LanguageCategory::class)->find($languageCategoryId);
        }

        if ($thematiqueCategoryId) {
            $thematiqueCategory = $em->getRepository(ThematiqueCategory::class)->find($thematiqueCategoryId);
        }

        $exercices = $exercicesRepository->findByCategory($languageCategory, $thematiqueCategory);

        $languageCategories = $em->getRepository(LanguageCategory::class)->findAll();
        $thematiqueCategories = $em->getRepository(ThematiqueCategory::class)->findAll();

        return $this->render('page_exercice/index.html.twig', [
            'exercices' => $exercices,
            'languageCategories' => $languageCategories,
            'thematiqueCategories' => $thematiqueCategories,
            'languageCategoryId' => $languageCategoryId,
            'thematiqueCategoryId' => $thematiqueCategoryId,
        ]);
    }
    */

    public function index(Request $request, ExercicesRepository $exerciceRepository)
    {
        $languageCategory = $request->request->get('languageCategory');
        $thematiqueCategory = $request->request->get('thematiqueCategory');

        $exercices = $exerciceRepository->createQueryBuilder('e')
            ->leftJoin('e.languageCategories', 'lc')
            ->leftJoin('e.thematiqueCategories', 'tc');

        if ($languageCategory && $thematiqueCategory) {
            $exercices->where('lc.id = :languageCategory')
                ->andWhere('tc.id = :thematiqueCategory')
                ->setParameters(['languageCategory' => $languageCategory, 'thematiqueCategory' => $thematiqueCategory]);
        } elseif ($languageCategory) {
            $exercices->where('lc.id = :languageCategory')
                ->setParameter('languageCategory', $languageCategory);
        } elseif ($thematiqueCategory) {
            $exercices->where('tc.id = :thematiqueCategory')
                ->setParameter('thematiqueCategory', $thematiqueCategory);
        }

        $exercices = $exercices->getQuery()->getResult();

        $languageCategories = $this->getDoctrine()->getRepository(LanguageCategory::class)->findAll();
        $thematiqueCategories = $this->getDoctrine()->getRepository(ThematiqueCategory::class)->findAll();

        return $this->render('page_exercice/index.html.twig', [
            'exercices' => $exercices,
            'languageCategories' => $languageCategories,
            'thematiqueCategories' => $thematiqueCategories,
        ]);
    }



}

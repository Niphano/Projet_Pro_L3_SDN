<?php

namespace App\Controller\Admin;

use App\Entity\Exercices;
use App\Entity\LanguageCategory;
use App\Entity\ThematiqueCategory;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ExercicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Exercices::class;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('enonce'),
            AssociationField::new('languageCategories')->autocomplete(),
            AssociationField::new('thematiqueCategories')->autocomplete(),


            TextField::new('resultat'),
            DateTimeField::new('createdAt')->setFormat('dd-MM-yyyy hh-mm'),

            /*
            ChoiceField::new('languageCategories')->allowMultipleChoices()->setChoices([
                static function (Exercices $foo): array {
                    $languageCategories = $foo->getLanguageCategories()->map(function (LanguageCategory $category) {
                        return $category->getName();
                    })->toArray();

                    return array_combine($languageCategories, $languageCategories);
                }
            ]),

            ChoiceField::new('thematiqueCategories')->allowMultipleChoices()->setChoices([
                static function (Exercices $foo): array {
                    $thematiqueCategories = $foo->getThematiqueCategories()->map(function (ThematiqueCategory $category) {
                        return $category->getName();
                    })->toArray();

                    return array_combine($thematiqueCategories, $thematiqueCategories);
                }
            ])
            */

        ];
    }

}

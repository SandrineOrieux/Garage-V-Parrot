<?php

namespace App\Controller\User;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield ChoiceField::new('rate', 'Rate')->setChoices([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ])->renderExpanded();
        yield TextEditorField::new('comment');
        yield BooleanField::new('isValidated');
    }
}

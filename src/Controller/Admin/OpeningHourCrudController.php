<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHour;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpeningHourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHour::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('day');
        yield AssociationField::new('am');
        yield AssociationField::new('pm');
        yield AssociationField::new('createdBy');
    }
}

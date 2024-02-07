<?php

namespace App\Controller\Admin;

use App\Entity\RepairService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RepairServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RepairService::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield TextareaField::new('description');
        yield AssociationField::new('createdBy');
    }
}

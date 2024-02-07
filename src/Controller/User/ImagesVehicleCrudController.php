<?php

namespace App\Controller\User;

use App\Entity\ImagesVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImagesVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesVehicle::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class);
    }
}

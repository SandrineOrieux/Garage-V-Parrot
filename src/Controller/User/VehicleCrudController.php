<?php

namespace App\Controller\User;

use App\Entity\Vehicle;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManager;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicle::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield AssociationField::new('brand')->hideOnIndex();
        yield AssociationField::new('model');
        yield TextField::new('title');
        yield DateField::new('year')->setFormat('yyyy');
        yield IntegerField::new('kilometer');
        yield IntegerField::new('price');
        yield TextEditorField::new('description')->hideOnIndex();
        yield AssociationField::new('createdBy')->hideOnIndex();
        yield AssociationField::new('type')->hideOnIndex();
        yield AssociationField::new('energy')->hideOnIndex();
        yield AssociationField::new('transmission')->hideOnIndex();
        yield AssociationField::new('numberOfDoors')->hideOnIndex();
        yield AssociationField::new('numberOfSeats')->hideOnIndex();
        yield AssociationField::new('power')->hideOnIndex();
        yield AssociationField::new('fiscalPower')->hideOnIndex();
        yield CollectionField::new('images')->useEntryCrudForm(ImagesVehicleCrudController::class);
        yield AssociationField::new('options')->setFormTypeOptionIfNotSet('by_reference', false);
    }
}

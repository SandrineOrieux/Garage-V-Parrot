<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterVehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('priceMin', IntegerType::class, [
                'required' => false,
                'attr' => ['placeHolder' => 'min'],
                'label' => false
            ])
            ->add('priceMax', IntegerType::class, [
                'required' => false,
                'attr' => ['placeHolder' => 'max'],
                'label' => false
            ])
            ->add('kmMin', IntegerType::class, [
                'required' => false,
                'attr' => ['placeHolder' => 'min'],
                'label' => false
            ])
            ->add('kmMax', IntegerType::class, [
                'required' => false,
                'attr' => ['placeHolder' => 'max'],
                'label' => false
            ])
            ->add('yearMin', IntegerType::class, [
                'required' => false,
                'attr' => ['placeHolder' => 'min'],
                'label' => false
            ])
            ->add('yearMax', IntegerType::class, [
                'required' => false,
                'attr' => ['placeHolder' => 'max'],
                'label' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

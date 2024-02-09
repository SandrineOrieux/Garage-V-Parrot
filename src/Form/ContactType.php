<?php

namespace App\Form;

use App\Entity\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', options: [
                'label' => 'Votre prénom :'
            ])
            ->add('lastname', options: [
                'label' => 'Votre nom :'
            ])
            ->add('message', options: [
                'label' => 'Votre demande :'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email :'
            ])
            ->add('object', options: [
                'label' => 'Objet de votre demande :'
            ])
            ->add('phone', options: [
                'label' => 'Votre numéro de téléphone :'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

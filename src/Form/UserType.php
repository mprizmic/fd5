<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
                ->add('username')
                ->add('roles', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, [
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => [
                        'Usuario' => 'ROLE_USER',
                        'Admin' => 'ROLE_ADMIN',
                        'SuperAdmin'=> 'ROLE_SUPER_ADMIN'
                    ]
                ])
                ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

}

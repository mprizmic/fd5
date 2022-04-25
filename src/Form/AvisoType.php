<?php

namespace App\Form;

use App\Entity\Aviso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AvisoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
                ->add('descripcion', TextType::class, [
                    'data' => 'xxx'
                ])
                ->add('fecha')
                ->add('activo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Aviso::class,
        ]);
    }

}

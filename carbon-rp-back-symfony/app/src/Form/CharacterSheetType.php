<?php

namespace App\Form;

use App\Entity\CharacterSheet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterSheetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pageNumber')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('protagonist')
            ->add('Owner')
            ->add('universe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CharacterSheet::class,
        ]);
    }
}

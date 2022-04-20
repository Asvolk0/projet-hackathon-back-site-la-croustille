<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Step;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormRecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('img', FileType::class)
            ->add('type', EntityType::class, [
                'class'=>Type::class,
                'choice_label'=>'name',
                'attr' => array(
                    'class' => 'type'
                )
            ])
            ->add('step', TextareaType::class, [
                'mapped'=>false,
                'label'=>'step 1'
            ])
            ->add('step2', TextareaType::class, [
                'mapped'=>false,
                'label'=>'step 2'
            ])
            ->add('step3', TextareaType::class, [
                'mapped'=>false,
                'label'=>'step 3'
            ])
            ->add('step4', TextareaType::class, [
                'mapped'=>false,
                'label'=>'step 4'
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'>',
                'attr' => array(
                    'class' => 'btn'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}

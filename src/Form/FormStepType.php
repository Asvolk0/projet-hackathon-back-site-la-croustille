<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Step;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormStepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('steps')
            ->add('recipe', EntityType::class, [
                'class'=>Recipe::class,
                'choice_label'=>'title',
                'attr' => array(
                    'class' => 'title'
                )
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
            'data_class' => Step::class,
        ]);
    }
}

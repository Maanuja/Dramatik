<?php

namespace App\Form;

use App\Entity\Critic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CritiqueFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('crTitle',TextType::class, [
                'label' => 'Titre de votre Commentaire',
            ])
            ->add('crCritic', TextareaType::class, [
            'label' => 'Votre Critique',
            ])
            ->add('crStory',NumberType::class, [
                'label' => 'Notez la storyLine',
                'attr' => [
                    'min' => 0,
                    'minMessage' => 'Note Minimal 0 :)!',
                    'max' => 10,
                    'step' => 'any',
                    'name' => 'qty',
                    'onblur' => "findTotal()"
                ]
            ])
            ->add('crMusic',NumberType::class, [
                'label' => 'Notez les OSTs',
                'attr' => [
                    'min' => 0,
                    'minMessage' => 'Note Minimal 0 :)!',
                    'max' => 10,
                    'step' => 'any',
                    'name' => 'qty',
                    'onblur' => "findTotal()"
                ]
            ])
            ->add('crCasting',NumberType::class, [
                'label' => 'Notez le casting',
                'attr' => [
                    'min' => 0,
                    'minMessage' => 'Note Minimal 0 :)!',
                    'max' => 10,
                    'step' => 'any',
                    'name' => 'qty',
                    'onblur' => "findTotal()"
                ]
            ])
            ->add('crRate',NumberType::class, [
                'label' => 'Votre note général',
                'attr' => [
                    'min' => 0,
                    'minMessage' => 'Note Minimal 0 :)!',
                    'max' => 10,
                    'step' => 'any',
                    'name' => 'total',
                    'onblur' => "findTotal()"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Critic::class,
        ]);
    }
}

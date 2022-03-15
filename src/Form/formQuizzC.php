<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;

class formQuizzC extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options = []) : void
    {
        $builder
            ->add('titre', TextType::class, ['required' => true, 'attr'=>['placeholder'=>'Titre du Quizz']])
            ->add('drama', TextType::class, ['required' => true, 'attr'=>['placeholder'=>'Titre du Drama']])
            ->add('nombre', ChoiceType::class,['required'=>true, 'placeholder' => 'Sélectionner le nombre de question souhaité', 'choices'  => ['5-Cinq' => '5','7-Sept' => '7','10-Dix' => '10']])
            ->add('file', FileType::class,['label'=>'Upload File',
                'label_attr' => ['class' => 'input-group-text'],
                'mapped' => false,
                'required' => true,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'image/*'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ]);
    }
}
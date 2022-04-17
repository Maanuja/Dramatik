<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use App\Entity\Quizz;
use App\Entity\Drama;

class FormQuizzC extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options = []) : void
    {
        $builder
            ->add('qzName', TextType::class, ['required' => true, 'attr'=>['placeholder'=>'Titre du Quizz']])

            ->add('qzDrama', EntityType::class, [
                // looks for choices from this entity
                'class' => Drama::class,
                'choice_label' => 'drName'])


            ->add('qzFormat', ChoiceType::class,['required'=>true, 'placeholder' => 'Sélectionner le nombre de question souhaité', 'choices'  => ['5-Cinq' => '5','7-Sept' => '7','10-Dix' => '10']])
            ->add('qzImg', FileType::class,['label'=>'Upload File',
                'label_attr' => ['class' => 'input-group-text'],
                'attr'=> ['class'=>'form-control'],
                'mapped' => false,
                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '5024k',
                        'mimeTypes' => [
                            'image/*'
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner une image de la la bonne taille et du bon format',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quizz::class,
        ]);
    }
}
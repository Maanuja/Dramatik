<?php

namespace App\Form;

use App\Entity\Drama;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class DramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('drName',TextType::class, [
                'label' => false,
            ])
            ->add('drDate',DateType::class, [
                'label' => false,
                'widget' => 'single_text',
            ])
            ->add('drDateEnd', DateType::class, [
                'label' => false,
                'widget' => 'single_text',
            ])
            ->add('drNbEp', IntegerType::class, [
                'label' => false,
                'attr' => [
                    'min' => 1,
                ]
            ])
            ->add('drRate',IntegerType::class, [
                'label' => false,
                'attr' => [
                    'min' => 0,
                    'minMessage' => 'Note Minimal 0 :)!',
                    'max' => 10,
                ]
            ])
            ->add('drImg', FileType::class,[
                'label' => false,
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => "image/[png,jpg,jpeg]"],
                'data_class' => null,
            ])
            ->add('drBannerImg',FileType::class,[
                'label' => false,
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => "image/[png,jpg,jpeg]"],
                'data_class' => null,
            ])
            ->add('drVideo',UrlType::class, [
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Drama::class,
        ]);
    }
}

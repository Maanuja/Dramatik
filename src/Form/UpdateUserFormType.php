<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class, [
                'label' => 'Votre Email',
                'attr' => ['placeholder' => "Pseudo@domain.com"],
            ])
            ->add('username',TextType::class, [
                'label' => 'Votre Pseudo',
            ])
            ->add('UsLname',TextType::class, [
                'label' => 'Votre Nom',
                ])
            ->add('UsFname',TextType::class, [
                'label' => 'Votre prénom',
            ])
            ->add('UsImg', FileType::class,[
                'label' => 'Une image de profil',
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => "image/png"],
                'data_class' => null,
            ])
            ->add('UsBanImg', FileType::class,[
                'label' => 'Une Image de bannière',
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => "image/png"],
                'data_class' => null,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class, [
                'label' => false,
                'attr' => ['placeholder' => "Pseudo@domain.com"],
            ])
            ->add('username',TextType::class, [
                'label' => false,
            ])
            ->add('UsLname',TextType::class, [
                'label' => false,
                ])
            ->add('UsFname',TextType::class, [
                'label' => false,
            ])
            ->add('UsImg', FileType::class,[
                'label' => false,
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

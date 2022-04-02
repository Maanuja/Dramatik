<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ctFName',TextType::class, [
                'label' => false,
            ])
            ->add('ctLName',TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => "Nom"],

            ])
            ->add('ctMail',EmailType::class, [
                'label' => false,
                'attr' => ['placeholder' => "Pseudo@domain.com"],

            ])
            ->add('ctTel',TextType::class,[
                'label' => false,
                'attr' => ['placeholder' => "00.00.00.00.00", 'id' => 'phone',
                ],
            ])
            ->add('ctMessage',TextareaType::class, [
                'label' => false,
                'attr' => ['rows' => 5,
                            'placeholder'=> "Entrer votre message ici...",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

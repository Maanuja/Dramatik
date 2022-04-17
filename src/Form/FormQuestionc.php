<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FormQuestionc extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options = []) : void
    {
        $builder
            ->add('question', TextType::class, ['required' => true, 'attr'=>['placeholder'=>'Question']])
            ->add('choice1', TextType::class, ['required' => true])
            ->add('choice2', TextType::class, ['required' => true])
            ->add('choice3', TextType::class, ['required' => true])
            ->add('choice4', TextType::class, ['required' => true]);
    }
}
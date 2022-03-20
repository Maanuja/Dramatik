<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class formQuestion extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*     $builder
                 ->add('question1', TextType::class, ['disabled'=> true])
                 ->add('choice', ChoiceType::class, [
                 'label' => 'Choisir',
                 'choices' => [
                     'Oui' => 2,
                     'Non' => 1,
                     "Ne sais pas" => 0
                 ],
                 'expanded' => true,
                 'multiple' => false
                 ])
                 ->add('question2', TextType::class, ['disabled'=> true])
                 ->add('choice', ChoiceType::class, [
                     'label' => 'Choisir',
                     'choices' => [
                         'Oui' => 2,
                         'Non' => 1,
                         "Ne sais pas" => 0
                     ],
                     'expanded' => true,
                     'multiple' => false
                 ]);*/
        //var_dump($options['data']);
        $question = $options['data'];
        for ($i = 0; $i < sizeof($question); $i++) {
            $choices = [];
            $choice = $question[$i]->getChoices();
            foreach ($choice as $ch){
                $choices[$ch->getChChoice()] = $ch->getChTrue();
            }
            $builder
                ->add('question'.$i, TextType::class, ['disabled'=> true, 'data' => $question[$i]->getId(), 'label'=> $question[$i]->getQtQuestion()])
                ->add('choice'.$i, ChoiceType::class, [
                   'label' => 'Choisir',
                    'choices' => $choices,
                    'expanded' => true,
                    'multiple' => false,
                    'choice_attr' => function($choice, $key, $value) {
                        // adds a class like attending_yes, attending_no, etc
                        return ['class' => 'btn-check'];
                    },

                ]);
        }

    }
}
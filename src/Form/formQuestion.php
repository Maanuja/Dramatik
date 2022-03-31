<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class formQuestion extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $question = $options['data'];
        for ($i = 0; $i < sizeof($question); $i++) {
            $choices = [];
            $choice = $question[$i]->getChoices();

            foreach ($choice as $ch){
                if($ch->getChTrue()){
                    $choices[$ch->getChChoice()] = true;
                }
                else{
                    $choices[$ch->getChChoice()] = $ch->getChChoice();
                }

            }
            $builder
                ->add('choice'.$i, ChoiceType::class, [
                    'label'=> $question[$i]->getQtQuestion(),
                    'choices' => $choices,
                    'expanded' => true,
                    'multiple' => false,
                    'choice_value' => function ($achoice) {
                        return $achoice == 'true' ? 'true' : $achoice;
                    },
                    'choice_attr' => function($choice, $key, $value) {
                        // adds a class like attending_yes, attending_no, etc
                        return ['class' => 'btn-check'];
                    },
                ]);
        }
        $builder
        ->add('submit', SubmitType::class);
    }
}
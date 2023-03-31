<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->setMethod('GET')
        ->add('title', TextType::class, [
            'required' => false,
            'empty_data' => '',
        ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Jeux' => 'Jeux',
                    'Console' => 'Console',
                    'Accessoire' => 'Accessoire',
                ],
            ])
            ->add('department' , ChoiceType::class, [
                'choices' => [
                    'Gard' => 'Gard',
                    'Hérault' => 'Hérault',
                ]])
            ->add('recherche',SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}

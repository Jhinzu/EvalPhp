<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title',
                'attr' => [
                    'placeholder' => 'Enter the title of the ad',
                ],
            ])
            ->add('type', TextType::class, [
                'label' => 'Type',
                'attr' => [
                    'placeholder' => 'Enter the type of the ad',
                ],
            ])
            ->add('container', TextType::class, [
                'label' => 'Container',
                'attr' => [
                    'placeholder' => 'Enter the container of the ad',
                ],
            ])
            ->add('dateAdd', null, [
                'label' => 'Date added',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('dateMaxPublication', null, [
                'label' => 'Max publication date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('department', TextType::class, [
                'label' => 'Department',
                'attr' => [
                    'placeholder' => 'Enter the department of the ad',
                ],
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Price',
                'currency' => 'EUR',
                'attr' => [
                    'placeholder' => 'Enter the price of the ad',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}

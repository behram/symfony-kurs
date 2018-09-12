<?php

namespace App\Form;

use App\Entity\Gorev;
use App\Entity\Urun;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlanTipleriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('basic_input', TextType::class)
            ->add('textarea_input', TextareaType::class)
            ->add('password', PasswordType::class)
            ->add('percent', PercentType::class)
            ->add('range', RangeType::class, [
                'attr' => array(
                    'min' => 5,
                    'max' => 50
                )
            ])
            ->add('color', ColorType::class)
            ->add('choice', ChoiceType::class, [
                'choices' => [
                    'Behram' => 0,
                    'Selim' => 1,
                    'Harun' => 2,
                ]
            ])
            ->add('urunler', EntityType::class, [
                'class' => Urun::class,
            ])
            ->add('ulkeler', CountryType::class)
            ->add('dogum_gunu', BirthdayType::class)
            ->add('embedded_form', EmbedFormType::class)
            ;
    }
}
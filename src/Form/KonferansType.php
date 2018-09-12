<?php

namespace App\Form;

use App\Entity\Konferans;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KonferansType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isim')
            ->add('afis', FileType::class, [
                'label' => 'Afis (PDF Dosyası)'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Görevi Kaydet',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Konferans::class,
        ]);
    }
}
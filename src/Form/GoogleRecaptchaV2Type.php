<?php

namespace Stev\GoogleRecaptchaBundle\Form;

use Stev\GoogleRecaptchaBundle\Validator\Constraints\RecaptchaV2;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoogleRecaptchaV2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new RecaptchaV2(),
            ],
            'error_bubbling' => true,
        ]);
    }

    public function getParent()
    {
        return HiddenType::class;
    }


}
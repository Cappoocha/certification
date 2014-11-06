<?php

namespace Certification\TestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Форма для работы с тестами
 *
 * Class TestType
 * @package Certification\TestBundle\Form\Type
 */
class TestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('time', 'integer')
            ->add('calculation', 'integer');
    }

    public function getName()
    {
        return "certification_test";
    }
} 
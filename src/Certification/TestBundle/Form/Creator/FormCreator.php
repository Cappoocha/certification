<?php

namespace Certification\TestBundle\Form\Creator;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * Базовый класс построителя форм
 *
 * Class FormCreator
 * @package Certification\TestBundle\Form\Creator
 */
abstract class FormCreator
{
    /**
     * Фабрика форм
     *
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * Роутер
     *
     * @var RouterInterface
     */
    protected $router;

    /**
     * @param FormFactoryInterface $formFactory
     * @param RouterInterface $router
     */
    public function __construct(FormFactoryInterface $formFactory, RouterInterface $router)
    {
        $this->formFactory = $formFactory;
        $this->router = $router;
    }
} 
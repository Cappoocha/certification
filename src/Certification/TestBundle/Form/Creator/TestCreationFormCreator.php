<?php

namespace Certification\TestBundle\Form\Creator;

use Certification\Module\Test\Dto\TestData;
use Certification\TestBundle\Form\Type\TestType;

/**
 * Построитель формы создания теста
 *
 * Class TestCreationFormCreator
 * @package Certification\TestBundle\Form\Creator
 */
class TestCreationFormCreator extends FormCreator
{
    const FORM_ACTION_ROUTE_NAME = 'certification_tests';

    /**
     * Создает фрму для добаления теста
     *
     * @param TestData $testData
     * @param null $returnUrl
     * @return \Symfony\Component\Form\FormInterface
     */
    public function create(TestData $testData = null, $returnUrl = null)
    {
        if (is_null($testData)) {
            $testData = new TestData();
        }

        if (! is_null($returnUrl)) {
            $returnUrl = urldecode($returnUrl);
        }

        $actionUrl = $this->router->generate(self::FORM_ACTION_ROUTE_NAME, array(
           'returnUrl' => $returnUrl
        ));

        $testForm = $this->formFactory->create(new TestType(), $testData, array(
            'action' => $actionUrl
        ));

        return $testForm;
    }
} 
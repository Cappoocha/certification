<?php

namespace Certification\TestBundle\Form\Handler;

use Certification\Module\Test\Dto\TestData;
use Certification\Module\Test\Service\TestService;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Обработчик формы создания теста
 *
 * Class TestCreationHandler
 * @package Certification\TestBundle\Form\Handler
 */
class TestCreationHandler
{
    /**
     * @var TestService
     */
    private $testService;

    /**
     * @param TestService $testService
     */
    public  function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function handle(FormInterface $form, Request $request)
    {
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                return $this->process($form->getData());
            }
            catch (\DomainException $domainError) {
                $form->addError(
                    new FormError($domainError->getMessage())
                );
            }
            catch (\Exception $ex) {
                throw $ex;
            }
        }

        return false;
    }

    /**
     * Обработка данных
     *
     * @param $testData
     * @throws \InvalidArgumentException
     */
    protected function process($testData)
    {
        if (! $testData instanceof TestData) {
            throw new \InvalidArgumentException();
        }

        return $this->testService->createTest($testData);
    }
} 
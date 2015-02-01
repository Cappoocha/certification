<?php

namespace Certification\TestBundle\Form\Handler;

use Certification\Module\Test\Dto\TestData;
use Certification\Module\Test\Entity\Test;
use Certification\Module\Test\Repository\TestRepositoryInterface;

/**
 * Обработчик формы создания теста
 *
 * Class TestCreationHandler
 * @package Certification\TestBundle\Form\Handler
 */
class TestCreationHandler extends TestFormHandler
{
	/**
	 * @var TestRepositoryInterface
	 */
	protected $testRepository;

	public function __construct(TestRepositoryInterface $testRepository)
	{
		$this->testRepository = $testRepository;
	}

	/**
	 * Обработка данных и создание теста
	 * @param TestData $testData
	 * @param array $params
	 * @return mixed|void
	 * @throws \InvalidArgumentException
	 */
	protected function processTestForm(TestData $testData, array $params = array())
	{
		$test = new Test();
		$test->setTitle($testData->title);
		$test->setTime($testData->time);
		$test->setCalculation($testData->calculation);

		$this->testRepository->save($test);
    }
} 
<?php
/**
 * @author Катерина
 * Date: 31.03.15
 * Time: 15:13
 */

namespace Certification\TestBundle\Form\Handler;

use Certification\Module\Test\Dto\TestData;
use Certification\Module\Test\Repository\TestRepositoryInterface;

/**
 * Обработчик формы редактирования теста
 *
 * Class TestEditHandler
 * @package Certification\TestBundle\Form\Handler
 */
class TestEditHandler extends TestFormHandler
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
	 * Обработка данных и редактирование теста
	 *
	 * @param TestData $testData
	 * @param array $params
	 * @return mixed|void
	 * @throws \InvalidArgumentException
	 */
	protected function processTestForm(TestData $testData, array $params = [])
	{
		$testId = $params['testId'];
		$test = $this->testRepository->findById($testId);
		$test->setTitle($testData->title);
		$test->setTime($testData->time);
		$test->setCalculation($testData->calculation);

		$this->testRepository->save($test);
	}
} 
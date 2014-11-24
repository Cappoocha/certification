<?php
/**
 * @author Катерина
 * Date: 24.11.14
 * Time: 14:13
 */

namespace Certification\TestBundle\Form\Handler;


use Certification\Module\Test\Dto\TestData;

abstract class TestFormHandler extends FormHandler
{
	/**
	 * Выполняет обработку данных
	 *
	 * @param $formData
	 * @param array $params
	 * @return mixed|void
	 */
	protected function process($formData, array $params = array())
	{
		$this->processTestForm($formData, $params);
	}

	/**
	 * Выполняет обработку данных теста
	 *
	 * @param TestData $testData
	 * @param array $params
	 * @return mixed
	 */
	abstract protected function processTestForm(TestData $testData, array $params = array());
} 
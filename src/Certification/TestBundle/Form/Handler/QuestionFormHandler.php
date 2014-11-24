<?php
/**
 * @author Катерина
 * Date: 24.11.14
 * Time: 14:52
 */

namespace Certification\TestBundle\Form\Handler;


use Certification\Module\Test\Dto\QuestionData;

abstract class QuestionFormHandler extends FormHandler
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
		$this->processQuestionForm($formData, $params);
	}

	/**
	 * Выполняет обработку вопроса
	 *
	 * @param QuestionData $questionData
	 * @param array $params
	 * @return mixed
	 */
	abstract protected function processQuestionForm(QuestionData $questionData, array $params = array());
} 
<?php
/**
 * @author Катерина
 * Date: 24.11.14
 * Time: 14:54
 */

namespace Certification\TestBundle\Form\Handler;


use Certification\Module\Test\Dto\QuestionData;
use Certification\Module\Test\Entity\Question;
use Certification\Module\Test\Repository\QuestionRepositoryInterface;
use Certification\Module\Test\Repository\TestRepositoryInterface;

class QuestionCreationHandler extends QuestionFormHandler
{
	/**
	 * @var QuestionRepositoryInterface
	 */
	protected $questionRepository;

	/**
	 * @var TestRepositoryInterface
	 */
	protected $testRepository;

	public function __construct(QuestionRepositoryInterface $questionRepository, TestRepositoryInterface $testRepository)
	{
		$this->questionRepository = $questionRepository;
		$this->testRepository = $testRepository;
	}

	/**
	 * Обрабатывает форму вопроса и добавляет вопрос
	 *
	 * @param QuestionData $questionData
	 * @param array $params
	 * @return mixed|void
	 */
	protected function processQuestionForm(QuestionData $questionData, array $params = array())
	{
		$question = new Question();
		$question->setTitle($questionData->title);
		$question->setScore($questionData->score);

		$test = $this->testRepository->findById($params['testId']);
		$question->setTest($test);

		$this->questionRepository->save($question);
	}
} 
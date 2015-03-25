<?php
/**
 * @author Катерина
 * Date: 24.11.14
 * Time: 14:54
 */

namespace Certification\TestBundle\Form\Handler;


use Certification\Module\Test\Dto\QuestionData;
use Certification\Module\Test\Entity\Answer;
use Certification\Module\Test\Entity\Question;
use Certification\Module\Test\Repository\AnswerRepositoryInterface;
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

	/**
	 * @var AnswerRepositoryInterface
	 */
	protected $answerRepository;

	/**
	 * @param QuestionRepositoryInterface $questionRepository
	 * @param TestRepositoryInterface $testRepository
	 * @param AnswerRepositoryInterface $answerRepository
	 */
	public function __construct(
		QuestionRepositoryInterface $questionRepository,
		TestRepositoryInterface $testRepository,
		AnswerRepositoryInterface $answerRepository
	)
	{
		$this->questionRepository = $questionRepository;
		$this->testRepository = $testRepository;
		$this->answerRepository = $answerRepository;
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

		$answerOne = new Answer();
		$answerOne->setAnswer($questionData->answer_one);
		$answerOne->setIsRight($questionData->checkbox_one);
		$answerOne->setQuestion($question);
		$this->answerRepository->save($answerOne);

		$answerTwo = new Answer();
		$answerTwo->setAnswer($questionData->answer_two);
		$answerTwo->setIsRight($questionData->checkbox_two);
		$answerTwo->setQuestion($question);
		$this->answerRepository->save($answerTwo);

		$answerThree = new Answer();
		$answerThree->setAnswer($questionData->answer_three);
		$answerThree->setIsRight($questionData->checkbox_three);
		$answerThree->setQuestion($question);
		$this->answerRepository->save($answerThree);

		$answerFor = new Answer();
		$answerFor->setAnswer($questionData->answer_two);
		$answerFor->setIsRight($questionData->checkbox_two);
		$answerFor->setQuestion($question);
		$this->answerRepository->save($answerFor);

		$test = $this->testRepository->findById($params['testId']);
		$question->setTest($test);

		$this->questionRepository->save($question);
	}
} 
<?php

namespace Certification\TestBundle\Controller;

use Certification\Module\Test\Dto\QuestionData;
use Certification\Module\Test\Entity\Question;
use Certification\TestBundle\Form\Handler\QuestionCreationHandler;
use Certification\TestBundle\Form\Type\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function addAction($testId, Request $request)
    {
		$questionForm = $this->createQuestionForm($this->generateUrl('certification_question_add', array('testId' => $testId)));

		/** @var QuestionCreationHandler $questionCreationHandler */
		$questionCreationHandler = $this->get('certification_test.form_hundler.question_creation');

        if ($questionCreationHandler->handle($questionForm, $request, array('testId' => $testId))) {
            return $this->redirect($this->generateUrl('certification_test_view', array('testId' => $testId)));
        }

        return $this->render(
           "TestBundle:Question:add.html.twig",
            array(
                "questionForm" => $questionForm->createView()
            ),
            Response::create('', Response::HTTP_OK)
        );
    }

	/**
	 * Создает форму для добавления вопроса
	 *
	 * @param $actionUrl
	 * @param Question $question
	 * @return \Symfony\Component\Form\Form
	 */
	private function createQuestionForm($actionUrl, Question $question = null)
	{
		$questionData = new QuestionData();

		if (! is_null($question)) {
			$questionData->title = $question->getTitle();
			$questionData->score = $question->getScore();
		}

		return $this->createForm(new QuestionType(), $questionData, array(
			'action' => $actionUrl
		));
	}
} 
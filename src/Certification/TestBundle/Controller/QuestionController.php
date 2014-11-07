<?php

namespace Certification\TestBundle\Controller;


use Certification\Module\Test\Service\QuestionService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function addAction($testId, Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('title', 'text')
            ->add('score', 'text')
            ->add('answer_one', 'text')
            ->add('checkbox_one', 'checkbox', array('label' => 'Is right'))
            ->add('answer_two', 'text')
            ->add('checkbox_two', 'checkbox', array('label' => 'Is right'))
            ->add('answer_three', 'text')
            ->add('checkbox_three', 'checkbox', array('label' => 'Is right'))
            ->add('answer_four', 'text')
            ->add('checkbox_four', 'checkbox', array('label' => 'Is right'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $questionData = $form->getData();
            $questionService = $this->getQuestionService();
            $questionService->createQuestion($questionData, (int) $testId);

            return $this->redirect($this->generateUrl('certification_test_view', array('testId' => $testId)));
        }

        return $this->render(
           "TestBundle:Question:add.html.twig",
            array(
                "form" => $form->createView()
            ),
            Response::create('', Response::HTTP_OK)
        );
    }

    /**
     * Возвращает серивс для работы с вопросами
     *
     * @return QuestionService
     */
    private function getQuestionService()
    {
        return $this->get('certification.service.question');
    }
} 
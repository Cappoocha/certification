<?php

namespace Certification\TestBundle\Controller;

use Certification\Module\Test\Dto\TestData;
use Certification\Module\Test\Entity\Test;
use Certification\Module\Test\Service\TestService;
use Certification\TestBundle\Form\Handler\TestCreationHandler;
use Certification\TestBundle\Form\Type\TestType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Контроллер для тестов
 *
 * Class TestController
 * @package Certification\Controller
 */
class TestController extends Controller
{
    public function listAction(Request $request)
    {
        $testService = $this->getTestService();
        $tests = $testService->getAllTests();

		$testForm = $this->createTestForm($this->generateUrl('certification_tests'));

		/** @var TestCreationHandler $testCreationHandler */
		$testCreationHandler = $this->get('certification_test.form_handler.test_creation');
		if ($testCreationHandler->handle($testForm, $request)) {
			return $this->redirect($this->generateUrl('certification_tests'));
		}

        return $this->render(
            "TestBundle:Test:list.html.twig",
            array(
                "testForm" => $testForm->createView(),
                "tests" => $tests
            ),
            Response::create('', Response::HTTP_OK)
        );
    }

    /**
     * Просмотр теста
     *
     * @param $testId
     * @return Response
     */
    public function viewAction($testId)
    {
        $testService = $this->getTestService();
        $test = $testService->getTestById($testId);
		$questions = $test->getQuestions();

        return $this->render(
            "TestBundle:Test:view.html.twig",
            array(
                "test" => $test,
				"questions" => $questions
            ),
            Response::create('', Response::HTTP_OK)
        );
    }

    /**
     * Удаляет тест
     *
     * @param $testId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($testId)
    {
        $testService = $this->getTestService();
		try {
			$testService->deleteTest($testId);
		} catch (\Exception $exception) {
			return $this->render("::error.html.twig", ["errorMessage" => $exception->getMessage()]);
		}

        return $this->redirect($this->generateUrl('certification_tests'));
    }

	/**
	 * Создает форму для создания/редактирования тестов
	 *
	 * @param $actionUrl
	 * @param Test $test
	 * @return \Symfony\Component\Form\Form
	 */
	private function createTestForm($actionUrl, Test $test = null)
	{
		$testData = new TestData();
		if (! is_null($test)) {
			$testData->title = $test->getTitle();
			$testData->time = $test->getTime();
			$testData->calculation = $test->getCalculation();
		}

		return $this->createForm(new TestType(), $testData, array(
			'action' => $actionUrl
		));
	}

    /**
     * Возвращает сервис для работы с тестами
     *
     * @return TestService
     */
    private function getTestService()
    {
        return $this->get('certification.service.test');
    }
} 
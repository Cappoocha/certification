<?php

namespace Certification\TestBundle\Controller;

use Certification\Module\Test\Dto\TestData;
use Certification\Module\Test\Entity\Test;
use Certification\Module\Test\Service\TestService;
use Certification\TestBundle\Form\Handler\TestCreationHandler;
use Certification\TestBundle\Form\Handler\TestEditHandler;
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
	/**
	 * Выводит тесты
	 *
	 * @return Response
	 */
	public function listAction()
    {
        $testService = $this->getTestService();
        $tests = $testService->getAllTests();

		$securityContext = $this->container->get('security.context');
		if ($securityContext->isGranted('ROLE_ADMIN')) {
			return $this->render(
				"UserBundle:Admin:testList.html.twig",
				["tests" => $tests],
				Response::create('', Response::HTTP_OK)
			);
		}

        return $this->render(
            "TestBundle:Test:list.html.twig",
            ["tests" => $tests],
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
            "UserBundle:Admin:testView.html.twig",
            array(
                "test" => $test,
				"questions" => $questions
            ),
            Response::create('', Response::HTTP_OK)
        );
    }

	/**
	 * Создает тест
	 *
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function addAction(Request $request)
	{
		$testForm = $this->createTestForm($this->generateUrl('admin_control_test_add'));

		/** @var TestCreationHandler $testCreationHandler */
		$testCreationHandler = $this->get('certification_test.form_handler.test_creation');
		if ($testCreationHandler->handle($testForm, $request)) {
			return $this->redirect($this->generateUrl('certification_tests'));
		}

		return $this->render(
			"TestBundle:Test:add.html.twig",
			["testForm" => $testForm->createView()],
			Response::create('', Response::HTTP_OK)
		);
	}

	public function editAction($testId, Request $request)
	{
		$testService = $this->getTestService();
		try {
			$test = $testService->getTestById($testId);
			$testForm = $this->createTestForm($this->generateUrl('admin_control_test_edit', ["testId" => $testId]), $test);

			/** @var TestEditHandler $testEditHandler */
			$testEditHandler = $this->get('certification_test.form_handler.test_edit');

			if ($testEditHandler->handle($testForm, $request, ['testId' => $testId])) {
				return $this->redirect($this->generateUrl('certification_tests'));
			}

			return $this->render(
				"TestBundle:Test:add.html.twig",
				["testForm" => $testForm->createView()],
				Response::create('', Response::HTTP_OK)
			);

		} catch (\Exception $exception) {
			return $this->render("::error.html.twig", ["errorMessage" => $exception->getMessage()]);
		}
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
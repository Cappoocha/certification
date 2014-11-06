<?php

namespace Certification\TestBundle\Controller;


use Certification\Module\Test\Service\TestService;
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
    public function listAction()
    {
        $testService = $this->getTestService();
        $tests = $testService->getAllTests();

        $form = $this->createFormBuilder()
            ->add('title', 'text')
            ->add('time', 'integer')
            ->add('calculation', 'integer')
            ->getForm();

        return $this->render(
            "TestBundle:Test:list.html.twig",
            array(
                "form" => $form->createView(),
                "tests" => $tests
            ),
            Response::create('', Response::HTTP_OK)
        );
    }

    /**
     * Создает тест
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('title', 'text')
            ->add('time', 'integer')
            ->add('calculation', 'integer')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $testData = $form->getData();
            $testService = $this->getTestService();
            $testService->createTest($testData);
        }

        return $this->redirect($this->generateUrl('certification_tests'));
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
        $testService->deleteTest($testId);

        return $this->redirect($this->generateUrl('certification_tests'));
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
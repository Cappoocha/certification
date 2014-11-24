<?php

namespace Certification\TestBundle\Controller;


use Certification\Module\Test\Entity\Test;
use Certification\Module\Test\Service\TestService;
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
    public function listAction()
    {
        $testService = $this->getTestService();
        $tests = $testService->getAllTests();

//        $form = $this->createFormBuilder()
//            ->add('title', 'text')
//            ->add('time', 'integer')
//            ->add('calculation', 'integer')
//            ->getForm();

        $form = $this->get('form.factory')->create(new TestType());

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
     * Просмотр теста
     *
     * @param $testId
     * @return Response
     */
    public function viewAction($testId)
    {
        $testService = $this->getTestService();
        $test = $testService->getTestById($testId);

        return $this->render(
            "TestBundle:Test:view.html.twig",
            array(
                "test" => $test
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
//        $form = $this->createFormBuilder()
//            ->add('title', 'text')
//            ->add('time', 'integer')
//            ->add('calculation', 'integer')
//            ->getForm();
        $test = new Test();
        $form = $this->get('form.factory')->create(new TestType(), $test);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $testData = $form->getData();
            $testService = $this->getTestService();
            $testService->createTest($test, $testData);

            return $this->redirect($this->generateUrl('certification_tests'));
        }

        return $this->render(
            "TestBundle:Test:list.html.twig",
            array(
                "form" => $form->createView(),
                "tests" => null
            )
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
<?php

namespace Certification\TestBundle\Controller;


use Certification\Module\Test\Service\TestService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

        return $this->render(
            "TestBundle:Test:list.html.twig",
            array(
                "tests" => $tests
            ),
            Response::create('', Response::HTTP_OK)
        );
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
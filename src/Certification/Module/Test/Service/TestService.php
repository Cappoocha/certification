<?php

namespace Certification\Module\Test\Service;

use Certification\Module\Test\Entity\Test;
use Certification\Module\Test\Repository\TestRepositoryInterface;

/**
 * Сервис для работы с тестами
 *
 * Class TestService
 * @package Certification\Module\Test\Service
 */
class TestService
{
    /**
     * @var TestRepositoryInterface
     */
    protected $testRepository;

    /**
     * @param TestRepositoryInterface $testRepository
     */
    public function __construct(TestRepositoryInterface $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    /**
     * Возвращает все тесты
     *
     * @return Test
     */
    public function getAllTests()
    {
        return $this->testRepository->findAll();
    }

    /**
     * Добавляет новый тест
     *
     * @param $testData
     */
    public function createTest($testData)
    {
        $test = new Test($testData);
        $this->testRepository->save($test);
    }
} 
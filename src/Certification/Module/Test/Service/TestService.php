<?php

namespace Certification\Module\Test\Service;

use Certification\Module\Test\Entity\Test;
use Certification\Module\Test\Repository\TestRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;

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
     * Находит тест по id
     *
     * @param $testId
     * @return Test
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function getTestById($testId)
    {
        $test = $this->testRepository->findById($testId);
        if (empty ($test)) {
            throw new EntityNotFoundException('Test not found');
        }

        return $test;
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

    public function deleteTest($testId)
    {
        $test = $this->testRepository->findById($testId);

        if (empty ($test)) {
            throw new EntityNotFoundException('Test not fount');
        }

        $this->testRepository->delete($test);
    }
} 
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
	 * Находит тест по id
	 *
	 * @param $testId
	 * @return Test
	 * @throws \Exception
	 */
	public function getTestById($testId)
    {
        $test = $this->testRepository->findById($testId);
        if (empty ($test)) {
            throw new \Exception('Test not found');
        }

        return $test;
    }

	/**
	 * Удаляет тест
	 *
	 * @param $testId
	 * @throws \Exception
	 */
	public function deleteTest($testId)
    {
        $test = $this->testRepository->findById($testId);

        if (empty ($test)) {
            throw new \Exception('Test not fount');
        }

        $this->testRepository->delete($test);
    }
} 
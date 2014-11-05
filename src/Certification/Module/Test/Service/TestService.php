<?php
/**
 * Created by PhpStorm.
 * User: bev
 * Date: 05.11.14
 * Time: 7:51
 */

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


} 
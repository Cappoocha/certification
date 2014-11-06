<?php
/**
 * @author Катерина
 * Date: 04.11.14
 * Time: 17:50
 */

namespace Certification\Module\Test\Repository\DoctrineOrm;


use Certification\Module\Doctrine\Repository\DoctrineORM\DoctrineOrmRepository;
use Certification\Module\Test\Repository\TestRepositoryInterface;

/**
 * Класс для работы с тестами
 *
 * Class TestRepository
 * @package Module\Test\Repository\DoctrineOrm
 */
class TestRepository extends DoctrineOrmRepository implements TestRepositoryInterface
{
} 
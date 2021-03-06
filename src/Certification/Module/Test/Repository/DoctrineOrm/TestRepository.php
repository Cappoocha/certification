<?php
/**
 * @author Катерина
 * Date: 04.11.14
 * Time: 17:50
 */

namespace Module\Test\Repository\DoctrineOrm;


use Doctrine\ORM\EntityRepository;
use Module\Test\Repository\TestRepositoryInterface;

/**
 * Класс для работы с тестами
 *
 * Class TestRepository
 * @package Module\Test\Repository\DoctrineOrm
 */
class TestRepository extends EntityRepository implements TestRepositoryInterface
{

} 
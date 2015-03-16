<?php
/**
 * @author Катерина
 * Date: 10.02.15
 * Time: 15:05
 */

namespace Certification\Module\User\Repository\DoctrineOrm;


use Certification\Module\Doctrine\Repository\DoctrineORM\DoctrineOrmRepository;
use Certification\Module\User\Repository\UserRepositoryInterface;

/**
 * Класс для работы с пользователями
 *
 * Class UserRepository
 * @package Certification\Module\User\Repository\DoctrineOrm
 */
class UserRepository extends DoctrineOrmRepository implements UserRepositoryInterface
{

} 
<?php
/**
 * @author Катерина
 * Date: 04.11.14
 * Time: 17:04
 */

namespace Module\User\Repository\DoctrineOrm;


use Doctrine\ORM\EntityRepository;
use Module\User\Repository\UserRepositoryInterface;

/**
 * Репозиторий для работы с пользователями
 *
 * Class UserRepository
 * @package Module\User\Repository\DoctrineOrm
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{

} 
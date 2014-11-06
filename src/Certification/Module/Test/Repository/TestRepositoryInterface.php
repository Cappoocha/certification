<?php
/**
 * @author Катерина
 * Date: 04.11.14
 * Time: 17:48
 */

namespace Certification\Module\Test\Repository;

use Certification\Module\Doctrine\Repository\RepositoryInterface;
use Certification\Module\Test\Entity\Test;

/**
 * Интерфейс репозитория для работы с тестами
 *
 * Interface TestRepositoryInterface
 * @package Module\Test\Repository
 *
 * @method Test findAll()
 */
interface TestRepositoryInterface extends RepositoryInterface
{

}
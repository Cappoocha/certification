<?php
/**
 * Created by PhpStorm.
 * User: bev
 * Date: 06.11.14
 * Time: 3:22
 */

namespace Certification\Module\Doctrine\Repository\DoctrineORM;


use Certification\Module\Doctrine\Entity\Entity;
use Certification\Module\Doctrine\Repository\RepositoryInterface;
use Doctrine\ORM\EntityRepository;

class DoctrineOrmRepository extends EntityRepository implements RepositoryInterface
{
    /**
     * Сохраняет сущность
     *
     * @param Entity $entity
     * @return mixed|void
     */
    public function save(Entity $entity)
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($entity);
        $entityManager->flush();
    }
} 
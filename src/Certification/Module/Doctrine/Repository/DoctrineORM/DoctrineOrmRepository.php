<?php

namespace Certification\Module\Doctrine\Repository\DoctrineORM;


use Certification\Module\Doctrine\Entity\Entity;
use Certification\Module\Doctrine\Repository\RepositoryInterface;
use Doctrine\ORM\EntityRepository;

class DoctrineOrmRepository extends EntityRepository implements RepositoryInterface
{
    /**
     * Извлекает сущность из хранилища по идентификатору
     *
     * @param $id
     * @return Entity|null
     */
    public function findById($id)
    {
        return $this->findOneBy(array(
            'id' => $id
        ));
    }

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

    /**
     * Удаляет сущность
     *
     * @param Entity $entity
     * @return mixed|void
     */
    public function delete(Entity $entity)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->remove($entity);
        $entityManager->flush();
    }
} 
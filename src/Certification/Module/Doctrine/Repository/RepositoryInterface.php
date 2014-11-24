<?php

namespace Certification\Module\Doctrine\Repository;


use Certification\Module\Doctrine\Entity\Entity;

interface RepositoryInterface
{
    /**
     * Извлекает сущность из хранилища по идентификатору
     *
     * @param $id
     * @return Entity|null
     */
    public function findById($id);

    /**
     * Сохраняет сущность
     *
     * @param Entity $entity
     * @return mixed
     */
    public function save(Entity $entity);

    /**
     * Удаляет сущность
     *
     * @param Entity $entity
     * @return mixed
     */
    public function delete(Entity $entity);
} 
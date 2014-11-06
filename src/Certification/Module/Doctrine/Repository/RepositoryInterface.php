<?php
/**
 * Created by PhpStorm.
 * User: bev
 * Date: 06.11.14
 * Time: 3:23
 */

namespace Certification\Module\Doctrine\Repository;


use Certification\Module\Doctrine\Entity\Entity;

interface RepositoryInterface
{
    /**
     * Сохраняет сущность
     *
     * @param Entity $entity
     * @return mixed
     */
    public function save(Entity $entity);
} 
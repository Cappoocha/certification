<?php

namespace Certification\Module\Doctrine\Entity;

/**
 * Базовый класс для сущности
 *
 * Class Entity
 * @package Certification\Module\Doctrine\Entity
 */
abstract class Entity
{
    /**
     * Идентификатор сущности
     *
     * @var mixed
     */
    protected  $id;

    /**
     * Возвращает идентификатор сущности
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
} 
<?php

namespace Certification\Module\Test\Entity;


use Certification\Module\Doctrine\Entity\Entity;
use Certification\Module\Test\Entity\Test;

/**
 * Вопросы к тесту
 *
 * Class Question
 * @package Certification\Module\Test\Entity
 */
class Question extends Entity
{
    /**
     * Описание вопроса
     *
     * @var string
     */
    private $title;

    /**
     * Тест, к которому относится вопрос
     *
     * @var Test
     */
    private $test;

    /**
     * Балл за правильный ответ на этот вопрос
     *
     * @var integer
     */
    private $score;

    /**
     * Возвращает описание
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Устанавливает описание
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Возвращает оценку вопроса
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Устанавливает оценку
     *
     * @param $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * Возвращает тест
     *
     * @return Test
     */
    public function getTest()
    {
        return $this->test;
    }
} 
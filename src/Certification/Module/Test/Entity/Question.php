<?php

namespace Certification\Module\Test\Entity;


use Certification\Module\Doctrine\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
    protected $test;

    /**
     * Балл за правильный ответ на этот вопрос
     *
     * @var integer
     */
    private $score;

	/**
	 * Ответы к вопросу
	 *
	 * @var Collection
	 */
	protected $answers;

	public function __construct()
	{
		$this->answers = new ArrayCollection();
	}

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

    /**
     * Привязывает тест
     *
     * @param Test $test
     * @return Question
     */
    public function setTest(Test $test)
    {
        $this->test = $test;
    }

	/**
	 * Добавляет ответ на вопрос
	 *
	 * @param $answer
	 */
	public function addAnswer($answer)
	{
		$this->answers[] = $answer;
	}

	/**
	 * Возвращает ответы на вопрос
	 *
	 * @return ArrayCollection|Collection
	 */
	public function getAnswers()
	{
		return $this->answers;
	}
} 
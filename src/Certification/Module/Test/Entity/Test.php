<?php
/**
 * @author Катерина
 * Date: 27.10.14
 * Time: 19:58
 */

namespace Certification\Module\Test\Entity;


use Certification\Module\Doctrine\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Test extends Entity
{
	/**
	 * Название теста
	 *
	 * @var string
	 */
	private $title;

	/**
	 * Способ расчета
	 *
	 * @var integer
	 */
	private $calculation;

	/**
	 * Время на выполнение
	 *
	 * @var string
	 */
	private $time;

    /**
     * Вопросы для теста
     *
     * @var Collection
     */
    protected $questions;

    public function __construct()
	{
        $this->questions = new ArrayCollection();
	}

	/**
	 * Возвращает название теста
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

    /**
     * Устанавливает название теста
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

	/**
	 * Возвращает способ расчета теста
	 *
	 * @return mixed
	 */
	public function getCalculation()
	{
		return $this->calculation;
	}

    /**
     * Устанавливает способ расчета
     *
     * @param $calculation
     */
    public function setCalculation($calculation)
    {
        $this->calculation = $calculation;
    }

	/**
	 * Возвращает время, данное на выполнение теста
	 *
	 * @return string
	 */
	public function getTime()
	{
		return $this->time;
	}

    /**
     * Устанавливает время
     *
     * @param $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * Возвращает вопросы для теста
     *
     * @return Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Добавляет вопрос в коллекцию
     *
     * @param Question $question
     * @return Test
     */
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }
} 
<?php
/**
 * @author Катерина
 * Date: 27.10.14
 * Time: 19:58
 */

namespace Certification\Module\Test\Entity;


class Test
{
	/**
	 * @var string
	 */
	private $id;

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
	 * @param $title
	 * @param $calculation
	 * @param $time
	 */
	public function __construct($title, $calculation, $time)
	{
		$this->title = $title;
		$this->calculation = $calculation;
		$this->time = $time;
	}

	/**
	 * Возвращает id теста
	 *
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
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
	 * Возвращает способ расчета теста
	 *
	 * @return mixed
	 */
	public function getCalculation()
	{
		return $this->calculation;
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
} 
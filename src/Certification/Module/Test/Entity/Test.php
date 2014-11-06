<?php
/**
 * @author Катерина
 * Date: 27.10.14
 * Time: 19:58
 */

namespace Certification\Module\Test\Entity;


use Certification\Module\Doctrine\Entity\Entity;

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
     * @param $testData
     */
    public function __construct($testData)
	{
		$this->title = $testData["title"];
		$this->calculation = $testData["calculation"];
		$this->time = $testData["time"];
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
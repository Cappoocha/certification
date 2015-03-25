<?php
/**
 * @author Катерина
 * Date: 25.03.15
 * Time: 14:52
 */

namespace Certification\Module\Test\Entity;

use Certification\Module\Doctrine\Entity\Entity;

/**
 * Ответы на вопросы к тесту
 *
 * Class Answer
 * @package Certification\Module\Test\Entity
 */
class Answer extends Entity
{
	/**
	 * Ответ
	 *
	 * @var string
	 */
	private $answer;

	/**
	 * Флаг, верный ли ответ
	 *
	 * @var boolean
	 */
	private $isRight;

	/**
	 * Вопрос, к которому относится ответ
	 *
	 * @var Question
	 */
	protected $question;

	/**
	 * Устанавливает ответ на вопрос
	 *
	 * @param $answer
	 */
	public function setAnswer($answer)
	{
		$this->answer = $answer;
	}

	/**
	 * Возвращает ответ на вопрос
	 *
	 * @return string
	 */
	public function getAnswer()
	{
		return $this->answer;
	}

	/**
	 * Выставляет правильность ответа
	 *
	 * @param $isRight
	 */
	public function setIsRight($isRight)
	{
		$this->isRight = $isRight;
	}

	/**
	 * Возвращает значение правильности ответа
	 *
	 * @return bool
	 */
	public function getIsRight()
	{
		return $this->isRight;
	}

	/**
	 * Создает связь с вопросом
	 *
	 * @param Question $question
	 */
	public function setQuestion(Question $question)
	{
		$this->question = $question;
	}

	/**
	 * Возвращает связанный вопрос
	 *
	 * @return Question
	 */
	public function getQuestion()
	{
		return $this->question;
	}
} 
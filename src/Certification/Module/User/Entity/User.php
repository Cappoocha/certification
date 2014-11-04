<?php
/**
 * @author Катерина
 * Date: 26.10.14
 * Time: 20:03
 */

namespace Certification\Module\User\Entity;


class User
{
	private $id;

	/**
	 * Email пользователя
	 *
	 * @var string
	 */
	private $email;

	/**
	 * Пароль
	 *
	 * @var string
	 */
	protected $password;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * Токен
	 *
	 * @var string
	 */
	protected $token;

	/**
	 * Устанавливаем email
	 *
	 * @param $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * Возвращает email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Устанавливает username пользователя
	 *
	 * @param $username
	 */
	public function setUsername($username)
	{
		$this->username = $username;
	}

	/**
	 * Устанавливает токен
	 *
	 * @param $token
	 */
	public function setToken($token)
	{
		$this->token = $token;
	}

	/**
	 * Возвращает токен
	 *
	 * @return string
	 */
	public function getToken()
	{
		return $this->token;
	}

	/**
	 * Устанавливает пароль
	 *
	 * @param $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * Возвращает пароль
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}
} 
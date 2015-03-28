<?php
/**
 * @author Катерина
 * Date: 26.10.14
 * Time: 20:03
 */

namespace Certification\Module\User\Entity;

use Certification\Module\Doctrine\Entity\Entity;
use Symfony\Component\Security\Core\User\UserInterface;

class User extends Entity implements UserInterface, \Serializable
{
	protected $id;

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
	 * Роли
	 *
	 * @var array
	 */
	protected $roles;

	/**
	 * Флаг активации аккаунта
	 *
	 * @var boolean
	 */
	private $isActive;

	public function __construct()
	{
		$this->isActive = false;
		$this->roles = ['ROLE_USER'];
	}

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
	 * Возвращает username
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
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

	/**
	 * @inheritdoc
	 *
	 * @return null|string
	 */
	public function getSalt()
	{
		return null;
	}

	/**
	 * @inheritdoc
	 *
	 * @return array|\Symfony\Component\Security\Core\Role\Role[]
	 */
	public function getRoles()
	{
		return $this->roles;
	}

	/**
	 * Добавляет новую роль
	 *
	 * @param array $role
	 */
	public function setRole(array $role = [])
	{
		$this->roles = $role;
	}

	/**
	 * Устанавливает флаг активности пользователя
	 *
	 * @param $isActive
	 */
	public function setIsActive($isActive)
	{
		$this->isActive = $isActive;
	}

	/**
	 * Возвращает флаг активности пользователя
	 *
	 * @return bool
	 */
	public function getIsActive()
	{
		return $this->isActive;
	}

	/**
	 * @inheritdoc
	 */
	public function eraseCredentials()
	{

	}

	/**
	 * @return string
	 */
	public function serialize()
	{
		return serialize(array(
			$this->id,
			$this->username,
			$this->password,
		));
	}

	/**
	 * @param string $serialized
	 */
	public function unserialize($serialized)
	{
		list ($this->id, $this->username, $this->password,) = unserialize($serialized);
	}
} 
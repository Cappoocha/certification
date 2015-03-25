<?php
/**
 * @author Катерина
 * Date: 11.02.15
 * Time: 13:17
 */

namespace Certification\UserBundle\Form\Handler;

use Certification\Module\User\Repository\UserRepositoryInterface;
use Certification\TestBundle\Form\Handler\FormHandler;

/**
 * Класс для обработки формы логина
 *
 * Class LoginHandler
 * @package Certification\UserBundle\Form\Handler
 */
class LoginHandler extends FormHandler
{
	/** @var  UserRepositoryInterface */
	private $userRepository;

	/**
	 * @param UserRepositoryInterface $userRepository
	 */
	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Выполняет обработку данных
	 *
	 * @param $loginData
	 * @param array $params
	 * @return mixed|void
	 */
	protected function process($loginData, array $params = array())
	{

	}
} 
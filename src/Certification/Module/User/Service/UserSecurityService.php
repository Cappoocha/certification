<?php
/**
 * @author Катерина
 * Date: 16.03.15
 * Time: 15:29
 */

namespace Certification\Module\User\Service;

use Certification\Module\User\Dto\UserRegisterData;
use Certification\Module\User\Entity\User;
use Certification\Module\User\Repository\UserRepositoryInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Сервис для безопасной обработки пользовательской информации
 *
 * Class UserSecurityService
 * @package Certification\Module\User\Service
 */
class UserSecurityService
{
	/**
	 * @var EncoderFactoryInterface
	 */
	private $encoderFactory;

	/**
	 * @var UserRepositoryInterface
	 */
	private $userRepository;

	/**
	 * @param UserRepositoryInterface $userRepository
	 * @param EncoderFactoryInterface $encoderFactory
	 */
	public function __construct(UserRepositoryInterface $userRepository, EncoderFactoryInterface $encoderFactory)
	{
		$this->userRepository = $userRepository;
		$this->encoderFactory = $encoderFactory;
	}

	public function registerUser(UserRegisterData $userRegisterData)
	{
		$user = new User();
		$user->setUsername($userRegisterData->username);
		$user->setPassword($this->encodePassword($user, $userRegisterData->password));
		$user->setEmail($userRegisterData->email);
		$user->setToken('');

		return $this->userRepository->save($user);
	}

	/**
	 * @param User $user
	 * @param $plainPassword
	 * @return string
	 */
	public function encodePassword(User $user, $plainPassword)
	{
		$encoder = $this->encoderFactory->getEncoder($user);

		return $encoder->encodePassword($plainPassword, $user->getSalt());
	}
} 
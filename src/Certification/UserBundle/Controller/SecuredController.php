<?php
/**
 * @author Катерина
 * Date: 10.02.15
 * Time: 15:28
 */

namespace Certification\UserBundle\Controller;

use Certification\Module\User\Dto\UserRegisterData;
use Certification\Module\User\Entity\User;
use Certification\Module\User\Service\UserSecurityService;
use Certification\UserBundle\Form\Type\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Class SecuredController
 * @package Certification\UserBundle\Controller
 */
class SecuredController extends Controller
{
	public function loginAction(Request $request)
	{
		$session = $request->getSession();

		$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
		$session->remove(SecurityContext::AUTHENTICATION_ERROR);

		return $this->render(
			'UserBundle:Secured:login.html.twig',
			array(
				'last_username' => $session->get(SecurityContext::LAST_USERNAME),
				'error' => $error)
		);
	}

	public function registerUserAction(Request $request)
	{
		$userSecurityService = $this->getUserSecurityService();

		$registrationForm = $this->createRegistrationForm($this->generateUrl('register'));
		$registrationForm->handleRequest($request);

		if ($registrationForm->isValid()) {
			$userSecurityService->registerUser($registrationForm->getData());

			return $this->redirect($this->generateUrl('login'));
		}

		return $this->render(
			'UserBundle:Secured:registration.html.twig',
			[
				'registerForm' => $registrationForm->createView(),
			]
		);
	}

	public function loginCheckAction(Request $request)
	{
	}

	public function logoutAction(Request $request)
	{
	}

	/**
	 * Создаем форму для регистрации пользователя
	 *
	 * @param $actionUrl
	 * @param User $user
	 * @return \Symfony\Component\Form\Form
	 */
	private function createRegistrationForm($actionUrl, User $user = null)
	{
		$userData = new UserRegisterData();

		if (! is_null($user)) {
			$userData->username = $user->getUsername();
			$userData->password = $user->getPassword();
			$userData->email = $user->getEmail();
		}

		return $this->createForm(new RegistrationType(), $userData, [
			'action' => $actionUrl
		]);

	}

	/**
	 * Возвращает сервис для безопасной обработки данных
	 * @return UserSecurityService
	 */
	private function getUserSecurityService()
	{
		return $this->get('certification_user.service.security');
	}
}
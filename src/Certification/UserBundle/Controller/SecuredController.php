<?php
/**
 * @author Катерина
 * Date: 10.02.15
 * Time: 15:28
 */

namespace Certification\UserBundle\Controller;

use Certification\UserBundle\Form\Type\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Class SecuredController
 * @package Certification\UserBundle\Controller
 */
class SecuredController extends Controller
{
	public function showLoginFormAction(Request $request)
	{
		$loginForm = $this->createForm(
			new LoginType($request),
			null,
			array('action' => $this->generateUrl('certification.form_login_check'))
		);

		return $this->render('UserBundle:Secured:loginForm.html.twig', array(
			'loginForm' => $loginForm->createView(),
			'targetPath' => '',
		));
	}

	public function loginAction(Request $request)
	{
		$session = $request->getSession();

		$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
		$session->remove(SecurityContext::AUTHENTICATION_ERROR);

		return $this->render(
			'UserBundle:Secured:login.html.twig',
			array(
				// last username entered by the user
				'last_username' => $session->get(SecurityContext::LAST_USERNAME),
				'error' => $error)
		);
	}

	public function loginCheckAction(Request $request)
	{
	}

	public function logoutAction(Request $request)
	{

	}
}
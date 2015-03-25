<?php
/**
 * @author Катерина
 * Date: 11.02.15
 * Time: 9:16
 */

namespace Certification\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;

class LoginType extends AbstractType
{
	private $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('email', 'text')
			->add('password', 'password')
			->add('remember_me', 'checkbox', array(
				'required' => false
			))
			->add('target_path', 'hidden')
			->add('submit', 'submit');
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return "";
	}
} 
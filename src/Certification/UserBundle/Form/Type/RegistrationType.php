<?php
/**
 * @author Катерина
 * Date: 19.03.15
 * Time: 14:43
 */

namespace Certification\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('email', 'email', ['required' => true])
			->add('username', 'text', ['required' => true])
			->add('password', 'repeated', ['type' => 'password', 'required' => true])
			->add('submit', 'submit');
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return "registration";
	}
} 
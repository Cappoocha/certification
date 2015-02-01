<?php
/**
 * @author Катерина
 * Date: 24.11.14
 * Time: 14:03
 */

namespace Certification\TestBundle\Form\Handler;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class FormHandler
{
	/**
	 * Выполняет обработку формы
	 *
	 * @param FormInterface $form
	 * @param Request $request
	 * @param array $params
	 * @throws \Exception
	 * @return boolean
	 */
	public function handle(FormInterface $form, Request $request, array $params = array())
	{
		$form->handleRequest($request);

		if ($form->isValid()) {
			try {
				$this->process($form->getData(), $params);

				return true;
			}
			catch (\DomainException $domainError) {
				$form->addError(
					new FormError($domainError->getMessage())
				);
			}
		}

		return false;
	}

	/**
	 * Выполняет обработку данных
	 *
	 * @param $formData
	 * @param array $params
	 * @return mixed
	 */
	abstract protected function process($formData, array $params = array());
} 
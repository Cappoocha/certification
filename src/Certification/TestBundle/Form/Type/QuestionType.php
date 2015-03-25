<?php
/**
 * @author Катерина
 * Date: 24.11.14
 * Time: 14:41
 */

namespace Certification\TestBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class QuestionType extends AbstractType
{
	/**
	 * Создает форму для добавления вопроса к тесту
	 *
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('title', 'text')
			->add('score', 'text')
			->add('answer_one', 'text')
			->add('checkbox_one', 'checkbox', array('label' => 'Is right'))
			->add('answer_two', 'text')
			->add('checkbox_two', 'checkbox', array('label' => 'Is right'))
			->add('answer_three', 'text')
			->add('checkbox_three', 'checkbox', array('label' => 'Is right'))
			->add('answer_four', 'text')
			->add('checkbox_four', 'checkbox', array('label' => 'Is right'))
			->add('save', 'submit');
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return "certification_question";
	}
} 
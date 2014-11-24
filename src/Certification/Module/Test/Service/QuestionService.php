<?php

namespace Certification\Module\Test\Service;
use Certification\Module\Test\Entity\Question;
use Certification\Module\Test\Repository\QuestionRepositoryInterface;
use Certification\Module\Test\Repository\TestRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;

/**
 * Сервис для работы с вопросами
 *
 * Class QuestionService
 * @package Certification\Module\Test\Service
 */
class QuestionService
{
    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * @var TestRepositoryInterface
     */
    protected $testRepository;

    /**
     * @param QuestionRepositoryInterface $questionRepository
     * @param TestRepositoryInterface $testRepository
     */
    public function __construct(QuestionRepositoryInterface $questionRepository, TestRepositoryInterface $testRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->testRepository = $testRepository;
    }

    /**
     * Создает вопрос
     *
     * @param $questionData
     * @param $testId
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function createQuestion($questionData, $testId)
    {
        $test = $this->testRepository->findById($testId);

        if (empty ($test)) {
            throw new EntityNotFoundException("Test not found");
        }

        $question = new Question();
        $question->setTitle($questionData["title"]);
        $question->setScore($questionData["score"]);
        $question->setTestId($testId);
        $question->setTest($test);

        $test->addQuestion($question);

        $this->questionRepository->save($question);
        $this->testRepository->save($test);
    }
} 
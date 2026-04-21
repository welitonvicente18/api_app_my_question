<?php

namespace Arch\Question\Application\UseCase;

use Arch\Question\Domain\Entity\Question;
use Arch\Question\Infra\QuestionRepository;
use Arch\Question\Infra\QuestionRepositoryInterface;

class GetIdQuestionUseCase
{
    public function __construct(
        public QuestionRepositoryInterface $questionRepository
    )
    {
    }

    public function getIdQuestion(int $id): Question
    {
        return $this->questionRepository->findById($id);
    }
}

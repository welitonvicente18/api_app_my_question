<?php
declare(strict_types=1);

namespace Arch\Question\Application\UseCase;

use Arch\Category\Domain\Exception\CategoryException;
use Arch\Category\Infra\CategoryRepository;
use Arch\Category\Infra\CategoryRepositoryInterface;
use Arch\Question\Application\DTO\QuestionDTO;
use Arch\Question\Domain\Entity\Question;
use Arch\Question\Domain\Exception\QuestionException;
use Arch\Question\Infra\QuestionRepository;
use Arch\Question\Infra\QuestionRepositoryInterface;
use Dotenv\Repository\RepositoryInterface;

class SaveQuestionUseCase
{
    public function __construct(
        public QuestionRepositoryInterface $questionRepository,
        public CategoryRepositoryInterface $categoryRepository,
    )
    {
    }

    /**
     * @throws CategoryException
     * @throws QuestionException
     */
    public function save(QuestionDTO $questionDTO): Question
    {
        $question = new Question(
            $questionDTO->id,
            $questionDTO->title,
            $questionDTO->description,
            $questionDTO->category_id,
            $questionDTO->optionQuestion,
        );

        $this->categoryRepository->findById($questionDTO->category_id);

        $this->questionRepository->save($question);
        return $question;
    }
}

<?php

namespace Arch\Question\Domain\Entity;

use Arch\Question\Application\DTO\OptionsQuestionDTO;
use Arch\Question\Domain\Exception\QuestionException;

class Question
{
    /**
     * @throws QuestionException
     */
    public function __construct(
        public ?int   $id,
        public string $title,
        public string $description,
        public int    $category_id,
        public array  $optionQuestion
    )
    {
        $this->limitOptions();
        $this->optionQuestion = $this->convertArrayToObject();
    }

    /**
     * @throws QuestionException
     */
    public function limitOptions(): void
    {
        $quantity = count($this->optionQuestion);
        if ($quantity < 2) {
            throw new QuestionException("Limit minimum of options is 2");
        }
        if ($quantity > 6) {
            throw new QuestionException("Limit maximum de options is 6");
        }
    }

    /**
     * @throws QuestionException
     */
    public function convertArrayToObject(): array
    {
        if (empty($this->optionQuestion)) {
            throw new QuestionException('The question must have at least one option');
        }

        $optionQuestionObjects = [];

        foreach ($this->optionQuestion as $option) {
            $optionQuestionObjects[] = new OptionsQuestionDTO(
                $option['order'],
                $option['description'],
                $option['isCorrect'],
            );
        }
        return $optionQuestionObjects;
    }
}

<?php

namespace Arch\Question\Application\DTO;

use Arch\Question\Domain\Exception\QuestionException;

class QuestionDTO
{
    public function __construct(
        public int    $id,
        public string $title,
        public string $description,
        public int    $category_id,
        public array  $optionQuestion
    )
    {

    }
}

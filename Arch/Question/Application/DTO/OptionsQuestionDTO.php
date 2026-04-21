<?php

namespace Arch\Question\Application\DTO;

class OptionsQuestionDTO
{
    public function __construct(
        public int    $order,
        public string $description,
        public bool   $isCorrect,
    )
    {
    }
}

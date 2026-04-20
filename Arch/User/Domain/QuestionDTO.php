<?php

namespace Arch\User\Domain;

class QuestionDTO
{
    public function __construct(
        public string $title,
        public string $content,
        public string $categoryId
    )
    {
    }
}

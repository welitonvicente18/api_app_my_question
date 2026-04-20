<?php

namespace Arch\Question\Domain\Entity;

class Question
{
    public function __construct(
        public ?int   $id,
        public string $title,
        public string $description,
        public int    $category_id,
        public int    $user_id,
    )
    {
    }
}

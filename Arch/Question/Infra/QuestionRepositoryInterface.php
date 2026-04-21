<?php

namespace Arch\Question\Infra;

use Arch\Question\Domain\Entity\Question;
use Arch\Question\Domain\Entity\ResponseQuestion;

interface QuestionRepositoryInterface
{
    public function save(Question $question): Question;
    public function findById(int $id): Question;
}

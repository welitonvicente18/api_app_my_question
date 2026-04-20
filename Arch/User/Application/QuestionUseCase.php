<?php

namespace Arch\User\Application;

use Arch\User\Domain\QuestionDTO;

class QuestionUseCase
{
    public function handle(QuestionDTO $questionDTO): void
    {

        var_dump($questionDTO);
    }
}

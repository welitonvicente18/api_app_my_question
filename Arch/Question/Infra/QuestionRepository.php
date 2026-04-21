<?php

namespace Arch\Question\Infra;

use App\Models\Question as QuestionModel;
use Arch\Question\Domain\Entity\Question;
use Arch\Question\Domain\Entity\ResponseQuestion;
use Arch\Question\Domain\Exception\QuestionException;

class QuestionRepository implements questionRepositoryInterface
{
    /**
     * @throws QuestionException
     */
    public function findById(int $id): Question
    {
        try {
            $model = new QuestionModel();
            $question = $model->query()->find($id);

        } catch (\Exception $exception) {
            throw new QuestionException("Question not found");
        }

        return new Question(...$question);
    }

    /**
     * @throws QuestionException
     */
    public function save(Question $question): Question
    {
        return new Question(
            1,
            'title_any',
            'description_any',
            1,
            [
                [
                    'order' => 1,
                    'description' => 'lorem ipsum',
                    'isCorrect' => true,
                ]
            ]
        );
    }
}

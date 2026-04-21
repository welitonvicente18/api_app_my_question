<?php

namespace Tests\Feature\Question;

use Arch\Category\Infra\CategoryRepository;
use Arch\Question\Application\DTO\QuestionDTO;
use Arch\Question\Application\UseCase\GetIdQuestionUseCase;
use Arch\Question\Application\UseCase\SaveQuestionUseCase;
use Arch\Question\Domain\Entity\Question;
use Arch\Question\Domain\Exception\QuestionException;
use Arch\Question\Infra\QuestionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaveQuestionUseCaseTest extends TestCase
{
    public function testShouldCreateAQuestionSuccessWithValidData(): void
    {
        $questionRepositoryMock = $this->createMock(QuestionRepository::class);
        $categoryRepositoryMock = $this->createMock(CategoryRepository::class);
        $questionRepositoryMock->expects($this->once())
            ->method('save');

        $questionDTO = new QuestionDTO(
            1,
            'title_any',
            'description_any',
            '2',
            $this->createArrayOptionsQuestion(6),
        );

        $saveQuestionUseCase = new SaveQuestionUseCase($questionRepositoryMock, $categoryRepositoryMock);
        $question = $saveQuestionUseCase->save($questionDTO);

        $this->assertEquals($questionDTO->id, $question->id);
    }

    public function testShouldErrorThrownIfOptionsQuestionEmpty(): void
    {
        $this->expectException(QuestionException::class);

        $questionDTO = new QuestionDTO(
            1,
            'title_any',
            'description_any',
            '2',
            []
        );

        $categoryRepositoryMock = $this->createMock(CategoryRepository::class);

        $questionRepository = new QuestionRepository();
        $saveQuestionUseCase = new SaveQuestionUseCase($questionRepository, $categoryRepositoryMock);

        $saveQuestionUseCase->save($questionDTO);
    }

    public function testShouldErrorThrownIfCategoryGreaterThanSix(): void
    {
        $this->expectException(QuestionException::class);

        $questionDTO = new QuestionDTO(
            1,
            'title_any',
            'description_any',
            '2',
            $this->createArrayOptionsQuestion(8),
        );

        $categoryRepositoryMock = $this->createMock(CategoryRepository::class);

        $questionRepository = new QuestionRepository();
        $saveQuestionUseCase = new SaveQuestionUseCase($questionRepository, $categoryRepositoryMock);

        $saveQuestionUseCase->save($questionDTO);
    }

    public function testShouldGenerateErrorIfTheCategoryIsLessThanTwo(): void
    {
        $this->expectException(QuestionException::class);

        $questionDTO = new QuestionDTO(
            1,
            'title_any',
            'description_any',
            '2',
            $this->createArrayOptionsQuestion(1),
        );

        $categoryRepositoryMock = $this->createMock(CategoryRepository::class);

        $questionRepository = new QuestionRepository();
        $saveQuestionUseCase = new SaveQuestionUseCase($questionRepository, $categoryRepositoryMock);

        $saveQuestionUseCase->save($questionDTO);
    }

    public function testShouldFindByIdQuestionSuccess(): void
    {
        $questionRepositoryMock = $this->createMock(QuestionRepository::class);

        $questionRepositoryMock->expects($this->once())
            ->method('findById')
            ->with(1)
            ->willReturn(new Question(
                1,
                'title_any',
                'description_any',
                '2',
                $this->createArrayOptionsQuestion(3),
            ));

        $saveQuestionUseCase = new GetIdQuestionUseCase($questionRepositoryMock);
        $response = $saveQuestionUseCase->getIdQuestion(1);

        $this->assertEquals(1, $response->id);
    }

    protected function createArrayOptionsQuestion(int $quantity): array
    {
        $newArray = [];
        for ($i = 1; $i <= $quantity; $i++) {
            $newArray[] = [
                'order' => $i,
                'description' => 'lorem ipsum - ' . $i,
                'isCorrect' => false,
            ];
        }

        return $newArray;
    }
}

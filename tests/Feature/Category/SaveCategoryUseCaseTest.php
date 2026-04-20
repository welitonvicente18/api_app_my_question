<?php

namespace Tests\Feature;

use Arch\Category\Application\DTO\CategoryDTO;
use Arch\Category\Application\UseCase\SaveCategoryUseCase;
use Arch\Category\Domain\Entity\Category;
use Arch\Category\Domain\Exception\CategoryException;
use Arch\Category\Domain\ValueObject\CategoryId;
use Arch\Category\Infra\CategoryRepository;
use Tests\TestCase;

class SaveCategoryUseCaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSaveCategorySuccess(): void
    {
        $expectedCategory = new Category(
            new CategoryId(1),
            'name_any',
            'description_any',
            1
        );

        $mockRepository = $this->createMock(CategoryRepository::class);

        $mockRepository->expects($this->once())
            ->method('save')
            ->willReturn($expectedCategory);

        $saveCategoryUseCase = new SaveCategoryUseCase($mockRepository);

        $categoryDTO = new CategoryDTO(
            null,
            'name_any',
            'description_any',
            1
        );

        $salveCategory = $saveCategoryUseCase->save($categoryDTO);

        $this->assertEquals($expectedCategory, $salveCategory);
    }

    public function testShouldThrowExceptionWhenCategoryDataIsEmpty(): void
    {
        $this->expectException(CategoryException::class);

        $mockRepository = $this->createStub(CategoryRepository::class);
        $saveCategoryUseCase = new SaveCategoryUseCase($mockRepository);

        $saveCategoryUseCase->save(new CategoryDTO(
            null,
            '',
            '',
            1
        ));
    }

    public function testShouldThrowExceptionWhenCategoryDataIsInvalid(): void
    {
        $this->expectException(CategoryException::class);
        $mockRepository = $this->createStub(CategoryRepository::class);


        $saveCategoryUseCase = new SaveCategoryUseCase($mockRepository);
        $saveCategoryUseCase->save(new CategoryDTO(
            null,
            12345,
            12345,
            1
        ));
    }
}

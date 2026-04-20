<?php

namespace Tests\Feature\Category;

use Arch\Category\Application\UseCase\GetFindCategoryUseCase;
use Arch\Category\Domain\Entity\Category;
use Arch\Category\Domain\Exception\CategoryException;
use Arch\Category\Domain\ValueObject\CategoryId;
use Arch\Category\Infra\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class ShouldFindCategoryExistTest extends TestCase
{
    public function testShouldFindCategoryExistSuccess(): void
    {
        $category = new Category(
            new CategoryId(1),
            'name_any',
            'description_any',
            2
        );

        $mockRepository = $this->createMock(CategoryRepository::class);

        $mockRepository->expects($this->once())
            ->method('findById')
            ->with(1)
            ->willReturn($category);

        $getFindCategoryUseCase = new GetFindCategoryUseCase($mockRepository);
        $categoryReturn = $getFindCategoryUseCase->findById(1);

        $this->assertSame($category, $categoryReturn);
    }

    public function testShouldCategoryNotExistReturnException(): void
    {
        $this->expectException(CategoryException::class);

        $categoryRepository = new CategoryRepository();
        $getFindCategoryUseCase = new GetFindCategoryUseCase($categoryRepository);
        $getFindCategoryUseCase->findById(2);
    }
}

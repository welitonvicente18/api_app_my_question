<?php

namespace Arch\Category\Application\UseCase;

use Arch\Category\Domain\Entity\Category;
use Arch\Category\Domain\ValueObject\CategoryId;
use Arch\Category\Infra\CategoryRepositoryInterface;

class GetFindCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function findById(int $id): Category
    {
        $categoryId = new CategoryId($id);
        return $this->categoryRepository->findById($categoryId->value);
    }
}

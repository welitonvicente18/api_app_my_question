<?php
declare(strict_types=1);

namespace Arch\Category\Application\UseCase;

use Arch\Category\Application\DTO\CategoryDTO;
use Arch\Category\Domain\Entity\Category;
use Arch\Category\Domain\Exception\CategoryException;
use Arch\Category\Domain\ValueObject\CategoryId;
use Arch\Category\Infra\CategoryRepositoryInterface;

class SaveCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    /**
     * @throws CategoryException
     */
    public function save(CategoryDTO $categoryDTO): Category
    {
        $category = new Category(
            $categoryDTO->id,
            $categoryDTO->name,
            $categoryDTO->description,
            $categoryDTO->user_id
        );

        return $this->categoryRepository->save($category);
    }
}

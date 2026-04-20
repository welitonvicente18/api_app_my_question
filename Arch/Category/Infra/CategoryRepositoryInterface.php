<?php

namespace Arch\Category\Infra;

use Arch\Category\Domain\Entity\Category;

interface CategoryRepositoryInterface
{
    public function findById(int $id): Category;

    public function save(Category $category): Category;
}

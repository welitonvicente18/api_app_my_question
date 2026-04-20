<?php

namespace Arch\Category\Infra;

use Arch\Category\Domain\Entity\Category;
use App\Models\Category as CategoryModel;
use Arch\Category\Domain\Exception\CategoryException;
use Arch\Category\Domain\ValueObject\CategoryId;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @param int $id
     * @return Category
     * @throws CategoryException
     */
    public function findById(int $id): Category
    {
        try {
            $categoryModel = CategoryModel::query()->findOrFail($id);
        } catch (\Exception $exception) {
            throw new CategoryException("Category not found with id {$id}");
        }

        return new Category(
            new CategoryId($categoryModel->id),
            $categoryModel->name,
            $categoryModel->description,
            $categoryModel->is_active
        );
    }

    /**
     * @throws CategoryException
     */
    public function save(Category $category): Category
    {
        try {
            $model = new CategoryModel();
            $model->name = $category->name;
            $model->description = $category->description;
            $model->user_id = $category->user_id;
            $model->save();

            $category->id = new CategoryId($model->id);
            return $category;

        } catch (CategoryException $exception) {
            throw new CategoryException("Error while saving Category with id {$category->id}");
        }
    }
}

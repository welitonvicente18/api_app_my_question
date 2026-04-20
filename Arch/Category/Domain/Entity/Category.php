<?php

namespace Arch\Category\Domain\Entity;

use Arch\Category\Domain\Exception\CategoryException;
use Arch\Category\Domain\ValueObject\CategoryId;

class Category
{
    /**
     * @throws CategoryException
     */
    public function __construct(
        public ?CategoryId $id,
        public string      $name,
        public string      $description,
        public int         $user_id
    )
    {
        if (empty($this->name) || is_numeric($this->name)) {
            throw new CategoryException("Category name is invalid");
        }
        if (empty($this->description) || is_numeric($this->description)) {
            throw new CategoryException("Category description is invalid");
        }
        if (empty($this->user_id)) {
            throw new CategoryException("Category user_id is invalid");
        }
    }
}

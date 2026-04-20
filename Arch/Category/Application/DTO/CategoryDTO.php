<?php

namespace Arch\Category\Application\DTO;

class CategoryDTO
{
    public function __construct(
        public ?int   $id = null,
        public string $name,
        public string $description,
        public int    $user_id,
    )
    {
    }
}

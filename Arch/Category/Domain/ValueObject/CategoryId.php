<?php

namespace Arch\Category\Domain\ValueObject;

class CategoryId
{
    public function __construct(
        public int $value
    )
    {
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $id;
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id'
    ];
}

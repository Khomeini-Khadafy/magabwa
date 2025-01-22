<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleNews extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'image',
        'thumbnail',
        'content',
        'category_id',
        'author_id',
        'is_featured'
    ];
}

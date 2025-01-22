<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleNews extends Model
{
    //
    use HasFactory, SoftDeletes;
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

    /**
     * Get the category and author that owns the ArticleNews
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}

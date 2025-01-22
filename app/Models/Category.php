<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 
        'slug', 
        'icon'
    ];

     /**
     * Get all of the news for the relation in table ArticleNews, for the Category
     * untuk melihat data berita yang ada di kategori tsb
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news(): HasMany
    {
        return $this->hasMany(ArticeleNews::class);
    }

}

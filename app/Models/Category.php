<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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
     * Set the name attribute and also set the slug attribute based on the value.
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

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

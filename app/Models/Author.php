<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Author extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'occupation',
        'avatar',
        'slug',
    ];

    /**
     * Set the name attribute and also set the slug attribute based on the value.
     * Menambahkan Attribut name dan slug untuk Author
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get all of the news for the relation in table ArticleNews, for the author
     * untuk melihat postingan berita yang udah di tulis oleh author tsb
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news(): HasMany
    {
        return $this->hasMany(ArticeleNews::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = ['title', 'slug', 'synopsis', 'category_id', 'year', 'actors', 'cover_image'];

    protected $guarded = [];

    public function getCoverImageUrlAttribute()
    {
        return Str::startsWith($this->cover_image, 'http')
            ? $this->cover_image
            : asset('images/' . $this->cover_image);
    }
}
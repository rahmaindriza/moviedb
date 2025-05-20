<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    // Tambahkan semua field yang bisa diisi massal
    // protected $fillable = [
    //     'title',
    //     'synopsis',
    //     'category_id',
    //     'year',
    //     'actors',
    //     'cover_image',
    //     'slug'
    // ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

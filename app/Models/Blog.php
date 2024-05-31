<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'main_image',
        'sub_images',
    ];

    protected $casts = [
        'sub_images' => 'json', // Cast the 'sub_images' attribute to JSON
    ];
    
    public function blog_category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

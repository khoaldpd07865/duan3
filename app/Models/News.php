<?php
// app/Models/News.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'summary',
        'content',
        'image',
        'category_id',
        'views',
    ];

    // Thiết lập mối quan hệ với bảng categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
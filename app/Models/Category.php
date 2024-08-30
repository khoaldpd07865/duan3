<?php

// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    // Thiết lập mối quan hệ với bảng news
    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }
}
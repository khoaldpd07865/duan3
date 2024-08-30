<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'news_id',
        'content',
        'author_name', // Đảm bảo rằng author_name được khai báo ở đây
    ];
}
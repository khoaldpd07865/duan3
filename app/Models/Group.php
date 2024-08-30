<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    // Nếu bảng của bạn không phải là số nhiều của tên mô hình
    // Ví dụ: nếu bảng của bạn là 'groups' thay vì 'group'
    protected $table = 'groups';

    // Các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'name',
    ];

    // Các thuộc tính sẽ không được hiển thị trong các mảng hoặc JSON
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
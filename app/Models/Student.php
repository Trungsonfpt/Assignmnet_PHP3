<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    // trỏ đến tên bảng
    protected $table= 'student';
    // Thêm các trường của bảng để add
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address',
        'image'
    ];
}


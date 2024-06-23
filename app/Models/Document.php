<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'file_size',
        'file_extension',
        'description',
        'status'
    ];

    // Связь с пользователем-владельцем файла
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

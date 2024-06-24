<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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


    public function histories()
    {
        return $this->hasMany(DocumentHistory::class, 'document_id')->with('user');
    }

    // Связь с пользователем-владельцем файла
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'kategori',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'nik',
        'uraian_pelayanan',
        'sumbang_pikiran',
        'file',
    ];

    use HasFactory;
}

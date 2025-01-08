<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'author',
        'isbn',
        'description',
        'published_at',
        'genre',
        'pages',
    ];

    

}

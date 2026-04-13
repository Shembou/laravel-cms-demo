<?php

namespace App\Models;

use Database\Factories\HeaderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    /** @use HasFactory<HeaderFactory> */
    use HasFactory;

    protected $table = 'header';

    protected $fillable = [
        'logo',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];
}

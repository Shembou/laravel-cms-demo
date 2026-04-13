<?php

namespace App\Models;

use Database\Factories\FooterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    /** @use HasFactory<FooterFactory> */
    use HasFactory;

    protected $table = 'footer';

    protected $fillable = [
        'logo',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];
}

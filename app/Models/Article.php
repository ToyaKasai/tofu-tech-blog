<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /** tinyIntからboolへキャストする */
    protected $casts = [
        'is_publish' => 'boolean',
        'is_save' => 'boolean',
    ];
}

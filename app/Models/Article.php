<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'source', 'is_publish', 'is_pickup', 'is_save'];

    /** tinyIntからboolへキャストする */
    protected $casts = [
        'is_publish' => 'boolean',
        'is_save' => 'boolean',
        'is_pickup' => 'boolean',
    ];

    public static function make(string $title, string $description, string $source, int $isPublish, int $isPickup, int $isSave): self
    {
        $self = new self();

        $self->fill([
            'title' => $title,
            'description' => $description,
            'source' => $source,
            'is_publish' => $isPublish,
            'is_pickup' => $isPickup,
            'is_save' => $isSave,
        ]);

        return $self;
    }
}

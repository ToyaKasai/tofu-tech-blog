<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'thumbnail_path', 'source', 'is_publish', 'is_save'];

    /** tinyIntからboolへキャストする */
    protected $casts = [
        'is_publish' => 'boolean',
        'is_save' => 'boolean',
    ];

    public static function make(string $title, string $description, string | null $thumbnailPath, string $source, int $isPublish, int $isSave): self
    {
        $self = new self();

        $self->fill([
            'title' => $title,
            'description' => $description,
            'thumbnail_path' => $thumbnailPath,
            'source' => $source,
            'is_publish' => $isPublish,
            'is_save' => $isSave,
        ]);

        return $self;
    }
}

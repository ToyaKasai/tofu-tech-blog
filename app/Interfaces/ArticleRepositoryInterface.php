<?php

namespace App\Interfaces;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    public function getAllArticles(): Collection;
    public function getArticlesByUpdatedAt(string $sort): Collection;
    public function getArticleById(int $articleId): Article;
    public function saveArticle(Article $article): bool;
    public function deleteArticle(int $articleId): void;
}

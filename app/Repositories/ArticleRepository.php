<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

final class ArticleRepository implements ArticleRepositoryInterface
{
    public function getAllArticles(): Collection
    {
        return Article::all();
    }

    public function getArticleById(int $articleId): Article
    {
        return Article::find($articleId);
    }

    public function saveArticle(Article $article): bool
    {
        return $article->save();
    }

    public function deleteArticle(int $articleId): void
    {
        Article::destroy($articleId);
    }
}

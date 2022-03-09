<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

final class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     *
     * @return Collection
     */
    public function getAllArticles(): Collection
    {
        return Article::all();
    }

    /**
     *
     * @return Collection
     */
    public function getArticlesByUpdatedAt(string $sort): Collection
    {
        return Article::orderBy('updated_at', $sort)->get();
    }

    /**
     *
     * @return Collection
     */
    public function getArticlesByIsPublish(Collection $articles): Collection
    {
        return $articles->where('is_publish', '=', 1);
    }

    /**
     *
     * @param integer $articleId
     * @return Article
     */
    public function getArticleById(int $articleId): Article
    {
        return Article::find($articleId);
    }

    /**
     *
     * @param Article $article
     * @return boolean
     */
    public function saveArticle(Article $article): bool
    {
        return $article->save();
    }

    /**
     *
     * @param integer $articleId
     * @return void
     */
    public function deleteArticle(int $articleId): void
    {
        Article::destroy($articleId);
    }
}

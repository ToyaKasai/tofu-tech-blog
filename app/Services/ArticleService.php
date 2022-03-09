<?php

namespace App\Services;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class ArticleService
{
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    public function getAllArticles(): Collection
    {
        return $this->repository->getAllArticles();
    }

    public function getArticleById(int $articleId): Article
    {
        return $this->repository->getArticleById($articleId);
    }

    public function saveArticle(Request $param): bool
    {
        $isPublish = $param->post('is_publish') === 'true' ? 1 : 0;

        $thumbnail = $param->file('thumbnail_path')?->store('public/image'); // storage内に保存
        $thumbnailPath = $thumbnail ?  str_replace('public/image/', '', $thumbnail) : null; // public/image/を除外

        $isSave = 0;

        $article = Article::make(
            $param->post('title'),
            $param->post('description'),
            $thumbnailPath,
            $param->post('source'),
            $isPublish,
            $isSave,
        );

        return $this->repository->saveArticle($article);
    }

    public function updateArticle(int $articleId, Request $param): bool
    {
        $article = $this->getArticleById($articleId);

        $isPublish = $param->post('is_publish') === 'true' ? 1 : 0;

        $thumbnail = $param->file('thumbnail_path')?->store('public/image'); // storage内に保存
        $thumbnailPath = $thumbnail ?  str_replace('public/image/', '', $thumbnail) : null; // public/image/を除外

        $article->title = $param->post('title');
        $article->description = $param->post('description');
        $thumbnailPath ? $article->thumbnail_path = $thumbnailPath : '';
        $article->source = $param->post('source');
        $article->is_publish = $isPublish;


        return $this->repository->saveArticle($article);
    }

    public function deleteArticle(int $articleId): void
    {
        $this->repository->deleteArticle($articleId);
    }
}

<?php

namespace App\Services;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class ArticleService
{
    /**
     *
     * @param ArticleRepositoryInterface $repository
     */
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    /**
     *
     * @return Collection
     */
    public function getAllArticles(): Collection
    {
        return $this->repository->getAllArticles();
    }

    /**
     *
     * @return Collection
     */
    public function getArticlesByUpdatedAt(string $sort): Collection
    {
        return $this->repository->getArticlesByUpdatedAt($sort);
    }

    /**
     *
     * @return Collection
     */
    public function getArticlesByIsPublish(Collection $articles): Collection
    {
        return $this->repository->getArticlesByIsPublish($articles);
    }

    /**
     *
     * @param integer $articleId
     * @return Article
     */
    public function getArticleById(int $articleId): Article
    {
        return $this->repository->getArticleById($articleId);
    }

    /**
     *
     * @param Request $param
     * @return boolean
     */
    public function saveArticle(Request $param): bool
    {
        $isPublish = $param->post('is_publish') === 'true' ? 1 : 0;

        $isSave = 0; // お気に入りは別でロジック切り出すので無条件でfalseにする
        $isPickup = 0; // TODO: 保存時どうしようね

        $article = Article::make(
            $param->post('title'),
            $param->post('description'),
            $param->post('source'),
            $isPublish,
            $isPickup,
            $isSave,
        );

        return $this->repository->saveArticle($article);
    }

    /**
     *
     * @param integer $articleId
     * @param Request $param
     * @return boolean
     */
    public function updateArticle(int $articleId, Request $param): bool
    {
        $article = $this->getArticleById($articleId);

        $isPublish = $param->post('is_publish') === 'true' ? 1 : 0;

        $article->title = $param->post('title');
        $article->description = $param->post('description');
        $article->source = $param->post('source');
        $article->is_publish = $isPublish;


        return $this->repository->saveArticle($article);
    }

    /**
     *
     * @param integer $articleId
     * @return void
     */
    public function deleteArticle(int $articleId): void
    {
        $this->repository->deleteArticle($articleId);
    }

    /**
     *
     * @param integer $articleId
     * @return boolean
     */
    public function updateIsSave(int $articleId): bool
    {
        $article = $this->getArticleById($articleId);

        $newValue = !$article->is_save ? 1 : 0;

        $article->is_save = $newValue;

        return $this->repository->saveArticle($article);
    }

    /**
     * @param array $changedStatuses
     * @return void
     */
    public function updateIsPickup(array $changedStatuses): void
    {
        foreach ($changedStatuses as $value) {
            $article = $this->getArticleById((int)$value['id']);
            $article->is_pickup = $value['status'] === 'true' ? 1 : 0;
            $this->repository->saveArticle($article);
        }
    }
}

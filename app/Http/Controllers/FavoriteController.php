<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;

class FavoriteController extends Controller
{
    public function __construct(private ArticleService $articleService)
    {
    }

    /**
     *
     * @param integer $articleId
     * @return boolean
     */
    public function updateFavorite(int $articleId): bool
    {
        return $this->articleService->updateIsSave($articleId);
    }
}

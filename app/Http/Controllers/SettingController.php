<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(private ArticleService $articleService)
    {
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('setting.index', [
            'articles' => $this->articleService->getArticlesByUpdatedAt('desc'),
        ]);
    }

    /**
     * @param Request $param
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePickupArticle(Request $param)
    {
        $this->articleService->updateIsPickup($param->post('changed_statuses'));

        return redirect()->route('setting.index')->with([
            'articles' => $this->articleService->getArticlesByUpdatedAt('desc'),
            'mode' => 'pickup',
        ]);
    }
}

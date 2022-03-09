<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @param ArticleService $service
     */
    public function __construct(private ArticleService $service)
    {
    }

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = $this->service->getArticlesByUpdatedAt('desc');

        return view('blog.index', [
            'articles' => $articles,
        ]);
    }

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     *
     * @param Request $param
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $param)
    {
        $success = $this->service->saveArticle($param);

        return $success ? redirect('/') : redirect('/404');
    }

    /**
     *
     * @param integer $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(int $id)
    {
        $article = $this->service->getArticleById($id);

        return view('blog.view', ['article' => $article]);
    }

    /**
     *
     * @param integer $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $article = $this->service->getArticleById($id);

        return view('blog.edit', ['article' => $article]);
    }

    /**
     *
     * @param integer $id
     * @param Request $param
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(int $id, Request $param)
    {
        $success = $this->service->updateArticle($id, $param);

        return $success ? redirect('view/' . $id) : redirect('/404');
    }

    /**
     *
     * @param integer $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(int $id)
    {
        $this->service->deleteArticle($id);

        return redirect('/');
    }
}

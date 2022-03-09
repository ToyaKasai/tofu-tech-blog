<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(private ArticleService $service)
    {
    }

    public function index()
    {
        $articles = $this->service->getAllArticles();

        return view('blog.index', [
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $param)
    {
        $success = $this->service->saveArticle($param);

        return $success ? redirect('/') : redirect('/404');
    }

    public function view(int $id)
    {
        $article = $this->service->getArticleById($id);

        return view('blog.view', ['article' => $article]);
    }

    public function edit($id)
    {
        $article = $this->service->getArticleById($id);

        return view('blog.edit', ['article' => $article]);
    }

    public function update(int $id, Request $param)
    {
        $success = $this->service->updateArticle($id, $param);

        return $success ? redirect('view/' . $id) : redirect('/404');
    }

    public function delete(int $id)
    {
        $this->service->deleteArticle($id);

        return redirect('/');
    }
}

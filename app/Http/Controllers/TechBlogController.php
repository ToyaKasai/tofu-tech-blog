<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class TechBlogController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('blog.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $article = new Article();

        /** booleanをtinyInt型にする */
        $is_publish = $request->input('is_publish') === 'true' ? 1 : 0;
        $is_save = $request->input('is_save') === 'true' ? 1 : 0;

        $thumbnail = $request->file('thumbnail_path')?->store('public/image'); // storage内に保存
        $thumbnail_path = $thumbnail ?  str_replace('public/image/', '', $thumbnail) : null; // public/image/を除外

        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->thumbnail_path = $thumbnail_path;
        $article->source = $request->input('source');
        $article->is_publish = $is_publish;
        $article->is_save = $is_save;

        $article->save();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechBlogController extends Controller
{
    public function index()
    {
        return view('blog.index', []);
    }

    public function create()
    {
        return view('blog.create');
    }
}

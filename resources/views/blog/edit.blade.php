@section('header')
@endsection

@extends('layouts.app')

@section('content')
    <blog-form-page
        :csrf={{ json_encode(csrf_token()) }}
        action-path="{{ route('blog.update', ['id' => $article->id]) }}"
        mode="edit"
        :default-values='@json($article)'
    ></blog-form-page>
@endsection

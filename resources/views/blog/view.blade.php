@extends('layouts.app')

@section('content')
    <view-page
        :article='@json($article)'
        :csrf="{{ json_encode(csrf_token()) }}"
        delete-path="{{ route('blog.delete', ['id' => $article->id]) }}"
        update-favorite-url="{{ route('favorite.update', ['id' => $article->id]) }}"
    ></view-page>
@endsection

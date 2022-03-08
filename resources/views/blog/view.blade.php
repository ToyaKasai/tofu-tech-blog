@extends('layouts.app')

@section('content')
    <view-page
        :article='@json($article)'
        :csrf={{ json_encode(csrf_token()) }}
        delete-path="{{ route('blog.delete', ['id' => $article->id]) }}"
    ></view-page>
@endsection

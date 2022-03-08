@extends('layouts.app')

@section('content')
    <blog-form-page :csrf={{ json_encode(csrf_token()) }} action-path="{{ route('blog.store') }}"></blog-form-page>
@endsection

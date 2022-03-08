@extends('layouts.app')

@section('content')
<blog-form-page :csrf={{json_encode(csrf_token())}}></blog-form-page>
@endsection

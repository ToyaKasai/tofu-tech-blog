@extends('layouts.app')

@section('content')
    <top-page :articles='@json($articles)'></top-page>
@endsection

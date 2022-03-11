@section('header')
@endsection

@extends('layouts.app')

@section('content')
    <setting-page :articles='@json($articles)'></setting-page>
@endsection

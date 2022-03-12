@section('header')
@endsection

@extends('layouts.app')

@section('content')
    <setting-page
        :csrf="{{ json_encode(csrf_token()) }}"
        :articles='@json($articles)'
        update-pickup-path="{{ route('setting.updatePickup') }}"
        :mode='@json($mode ?? '')'
    ></setting-page>
@endsection

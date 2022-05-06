<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Head Section -->
    @section('head')
        <title>{{ config('app.name') }}</title>
@show

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app" class="global-wrapper">
    {{-- ヘッダー --}}
    @section('header')
        <global-header create-path="{{ route('blog.create') }}"></global-header>
    @show

    {{-- コンテンツ --}}
    <main>
        @yield('content')
    </main>

    {{-- フッター --}}
    @section('footer')
        <global-footer></global-footer>
    @show
</div>
</body>

</html>

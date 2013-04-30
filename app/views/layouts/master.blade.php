<!DOCTYPE HTML>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
	<link rel="stylesheet" href="css/screen.css" />
    <script type="text/javascript" src="/js/libs/zepto.min.js"></script>
    @yield('head')
</head>
<body>
    <div class="header">
        <ul>
        @section('navigation')
            <li><a href="/">Home</a></li>
            <li><a href="/sprites">Sprites</a></li>
            @if (!Auth::check())
            <li><a href="/login/">Login</a></li>
            @else
            <li><a href="/logout/">Logout</a></li>
            @endif
        @show
        </ul>
    </div>
    @yield('content')
</body>
</html>
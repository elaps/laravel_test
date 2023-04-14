<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',config('app.name'))</title>
    @vite('resources/css/app.css')
    @stack('css')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                <li class="nav-item">
                    <a class="nav-link {{isActiveLink('home')}}" href="{{route('home')}}">{{__('Главная')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{isActiveLink('blog')}}" href="{{route('blog')}}">{{__('Блог')}}</a>
                </li>


            </ul>
            <a class="nav-link {{isActiveLink('login')}}" href="{{route('login')}}">{{__('Логин')}}</a>

        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
@stack('js')
</body>
</html>

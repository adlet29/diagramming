<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
            </button>
        </div>
        <div class="img bg-wrap text-center py-4" style="background-image: url('{{ asset('img/W7A9223.jpg') }}');">
            <div class="user-logo">
                <div class="img" style="background-image: url('{{ asset('img/avatar.jpg') }}');"></div>
                <h3>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
            </div>
        </div>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ url('/teacher') }}"><span class="fa fa-home mr-3"></span> Мои Студенты </a>
            </li>
            <li>
                <a href="{{ url('/teacher/plank') }}"><span class="fa fa-support mr-3"></span> Вируальная сцена </a>
            </li>
            <li>
                <a href="{{ url('/teacher/labas') }}"><span class="fa fa-support mr-3"></span> Лаборатории </a>
            </li>
            <li>
                <a href="#"><span class="fa fa-address-card-o mr-3"></span> Регистрация задание </a>
            </li>
            <li>
                <a href="#"><span class="fa fa-file mr-3"></span> Отчет </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"><span class="fa fa-sign-out mr-3"></span>
                    {{ __('Выйти') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>
        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        @yield('content')
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset("js/main/jquery.min.js") }}"></script>
<script src="{{ asset("js/main/popper.js") }}"></script>
<script src="{{ asset("js/main/jquery.min.js") }}"></script>
<script src="{{ asset("js/main/main.js") }}"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|Roboto:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">



    {{--    <title>Admin panel</title>--}}
    @yield('title')
</head>
<body>

<div id="admin">
    <div id="app">
        <nav class="navbar navbar-expand-lg sticky-top border-bottom bg-light">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('/img/icons/main-logo-310.svg') }}" height="40" alt="logo">
            </a>
            <button type="button" name="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a href="#" class="nav-link">Альбомы</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Категории</a>
                    </li>


                    @can('superAdmin')
                        <li class="nav-item">
                            <a href="#" class="nav-link">Пользователи</a>
                        </li>
                    @endcan

                </ul>


                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>



            </div>
        </nav>



        @include('layouts.errors')

        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    {{--    Подключение редактора--}}
    {{--<script src="/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.tinymce',
            theme: 'modern',
            width: '100%',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | caption",
            image_caption: true,
            image_advtab: true,
            external_filemanager_path: "/filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {"filemanager": "/filemanager/plugin.min.js"},
            visualblocks_default_state: true,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            style_formats_autohide: true,
            style_formats_merge: true
        });
    </script>--}}
    {{--    Подключение редактора--}}




    <script src="/js/app.js"></script>

    @if(Session::has('flash_message')) @include('Admin.partial.flash_message') @endif
</div>

</body>
</html>

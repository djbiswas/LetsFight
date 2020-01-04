<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
        <main id="app" class="d-flex flex-row-reverse ">
            <div class="container-fluid p-0">
                <nav class="navbar navbar-dark bg-dark mb-5">

                    <button id="menu-toggle" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>

                @yield('content')
            </div>

            <aside id="main-sidebar" class="col-2 min-vh-100 h-100 bg-dark shadow ">
                <ul id="accordion1" class="nav nav-pills nav-fill flex-column">
                    <li>
                        <a class="navbar-brand" href="{{ url('/') }}">

                            <img class="img-fluid" src="{{ asset('images/logo.jpg')}}" alt="{{config('app.name','Soft X Technology ltd')}}" />
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#item-1" data-parent="#accordion1">Item 1</a>
                        <div id="item-1" class="collapse">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 1-1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 1-2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 1-3</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion1">Item 2</a>
                        <div id="item-2" class="collapse">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 2-1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 2-2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 2-3</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion1">Item 3</a>
                        <div id="item-3" class="collapse">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 3-1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 3-2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sub 3-3</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </aside>


        </main>


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/admin.js') }}" defer></script>

</body>
</html>

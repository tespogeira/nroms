<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>App RBU</title>
    @csrf
    <style>
        body {
            padding: 10px;
            font-size: 14px;
        }

        .navbar {
            margin: 5px;
        }
        }

    </style>
</head>

<body>
    <div class="container">
        @component('layouts.componentes.navbar')
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
            @hasSection('content')
                @yield('content')
            @endif
        </main>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-1">©{{ Carbon\Carbon::now()->year }}
            <a href="/"> iNPKI</a> v0.1
        </div>
    </footer>
    <!-- Footer -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>

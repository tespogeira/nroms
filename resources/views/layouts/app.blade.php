<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>App RBU</title>
    @csrf
    <style>
        body {
            padding: 10px;
        }

        .navbar {
            margin: 5px;
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
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>

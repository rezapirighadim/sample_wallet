<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wallet</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/app.css">
</head>
<body>

    @section('navbar')
        @include('_partials.nabbar')
    @show

    @if(Session::has('message'))
        <div class="container mb-5 pt-5">
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('message') }}
            </p>
        </div>
    @endif

    <div class="body-content">
        @yield('content')
    </div>

    @include('_partials.footer')

    <script src="/app.js"></script>
    <script>
        new WOW().init();
    </script>

    @stack('script')

</body>
</html>

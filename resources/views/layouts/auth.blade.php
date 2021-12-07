<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5777ba" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{config('app.name')}}</title>
    <link href="/assets/img/comic-x.png" rel="icon">
    <meta content="Competition of Islamic Creativity, merupakan ajang perlombaan yang diadakan oleh UKM MCOS STIKOM Bali" name="description">
    <meta property="og:description" content="Competition of Islamic Creativity, merupakan ajang perlombaan yang diadakan oleh UKM MCOS STIKOM Bali" >
    <meta property="og:title" content="@yield('title') - {{config('app.name')}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{\URL::current()}}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/css/auth.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        @media screen and (max-width: 981px) {
            .full-height {
                height: 1000px;
            }
        }
    </style>
    @yield('head')
</head>
<body style="background-image: url('assets/img/bg/pattern.jpeg'); background-size: cover;">
    <div id="app" class="flex-center position-ref full-height text-center" >
        <main class="py-4">
        <a href="/"><img src="{{asset('assets/img/comic-x.png')}}" alt="matalogi" width="200"></a>
            @yield('content')
        </main>
    </div>
</body>
</html>
<!-- Scripts -->
<script src="{{ asset('/admin/vendor/jquery/jquery.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $('.number-format').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
            });
</script>
@yield('script')

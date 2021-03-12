<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{$title}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('backend/assets/img/logo.svg')}}" />
    @include('layouts.link.css')
    @stack('css')
</head>

<body class="nav-fixed">

    @include('layouts.partials.navbar')

    <div id="layoutSidenav">
        @include('layouts.partials.sidebar.'.Auth::user()->role)
        <div id="layoutSidenav_content">
            @include('layouts.content')
            @include('layouts.partials.footer')
        </div>
    </div>
    @include('layouts.link.js')
    @stack('js')
</body>

</html>

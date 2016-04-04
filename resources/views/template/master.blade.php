<!doctype html>
<html lang="it_IT">
<head>
    <meta charset="UTF-8">
    <title>Ricette</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}">
{{--    <link rel="stylesheet" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ URL::asset('bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('bower_components/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('bower_components/dropzone/dist/min/dropzone.min.css') }}">


    <script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    {{--<script src="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>--}}
    {{--Select2--}}
    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.min.js') }}"></script>
    {{--Masonry--}}
    <script src="{{ URL::asset('bower_components/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/masonry/dist/masonry.pkgd.min.js') }}"></script>
    {{--Dropzone--}}
    <script src="{{ URL::asset('bower_components/dropzone/dist/min/dropzone.min.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

</head>
<body>
<div class="navbar navbar-inverse noprint stripes" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::route('home')}}">Ricette</a>
        </div>
        <div class="collapse navbar-collapse" id="menu-collapse">
            <ul class="nav navbar-nav navbar-left" style="float:none;">
                <li><a href="{{URL::route('home')}}">Home</a></li>
                @if( Auth::check() )
                    <li><a href="{{URL::route('recipe.add_page')}}">Aggiungi Ricetta</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>

</div>

    @yield('content')

</body>
</html>
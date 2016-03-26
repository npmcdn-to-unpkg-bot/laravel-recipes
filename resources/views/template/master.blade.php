<!doctype html>
<html lang="it_IT">
<head>
    <meta charset="UTF-8">
    <title>Ricette</title>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</head>
<body>
<div class="navbar navbar-inverse noprint" >
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
            <ul class="nav navbar-nav" style="float:none;">
                <li><a href="{{URL::route('home')}}">Home</a></li>
                <li><a href="{{URL::route('recipe.add_page')}}">Aggiungi</a></li>
            </ul>
        </div>
    </div>

</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
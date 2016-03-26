@extends('template.master')

@section('content')

    <h1>Aggiungi ricetta</h1>

   {!! Form::open(['route' => 'recipe.create', 'method'=> 'post']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Titolo') !!}
        {!! Form::text('title', null, array('class' => 'form-control'))  !!}
    </div>

    <div class="form-group">
        {!! Form::label('directions', 'Procedura')  !!}
        {!! Form::textArea('directions', null, array('class' => 'form-control'))  !!}
    </div>

    {!!Form::token() !!}

    {!! Form::submit('Aggiungi!', array('class' => 'btn btn-primary'))  !!}

    {!! Form::close() !!}


@endsection
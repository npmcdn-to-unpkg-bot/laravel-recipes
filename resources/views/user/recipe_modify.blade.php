@extends('template.master')

@section('content')

    <h1>Modifica ricetta</h1>

    {!! Form::model($recipe, array('route' => array('recipe.update', "id"=> $recipe->id), 'method' => 'PUT') ) !!}

    <div class="form-group">
        {!!  Form::label('Titolo', 'Title') !!}
        {!!  Form::text('title', null, array('class' => 'form-control') ) !!}
    </div>

    <div class="form-group">
        {!!  Form::label('Descrizione', 'Directions') !!}
        {!!  Form::textArea('directions', null, array('class' => 'form-control')) !!}
    </div>

    {!!  Form::submit('Modifica', array('class' => 'btn btn-primary')) !!}

    {!!  Form::close() !!}

@endsection
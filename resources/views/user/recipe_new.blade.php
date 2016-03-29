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

    <div class="form-group">
        {!!  Form::label('Ingredient', 'Ingredienti') !!}
        <select id="Ingredient" name="ingredient[]" class="js-ingredients form-control" required="required">
            <option></option>
            @foreach($ingredients as $ingredient)
                <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
            @endforeach
        </select>
    </div>


    {!!Form::token() !!}

    {!! Form::submit('Aggiungi!', array('class' => 'btn btn-primary'))  !!}

    {!! Form::close() !!}






    <script>

        (function ($) {

            /* Select2 init */
            $(".js-ingredients").select2({
                theme: 'bootstrap',
                multiple: "multiple",
                tags: true,
                tokenSeparators: [',', ' '],
                placeholder: "Scegli un ingrediente o aggiungine uno nuovo scrivendo direttamente qui dentro"

            });
            $(".js-ingredients").select2("val", "");

        })(jQuery);

    </script>

@endsection
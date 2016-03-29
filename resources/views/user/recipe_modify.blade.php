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

    <div class="form-group">
        {!!  Form::label('Ingredient', 'Ingredienti') !!}
        <select id="Ingredient" name="ingredient[]" class="js-ingredients form-control">
            @foreach($ingredients as $ingredient)
                <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
            @endforeach
        </select>
    </div>

    {!!  Form::submit('Modifica', array('class' => 'btn btn-primary')) !!}
    {!!  Form::close() !!}

    <div class="hidden">
        @foreach($recipe->ingredient as $ingredient)
            <span>{{$ingredient->id}}</span>
        @endforeach
    </div>



    <script>

        (function ($) {

            var ingredients = $(".js-ingredients");

            var selected = [];

            $(".hidden span")
            .each(function () {
                selected.push($(this).html());
            });

            console.log(selected);

            /* Select2 init */
            ingredients.select2({
                theme: 'bootstrap',
                multiple: "multiple",
                tags: true,
                tokenSeparators: [',', ' ']
            })
            .val(selected);

            ingredients.trigger("change");

        })(jQuery);

    </script>

@endsection
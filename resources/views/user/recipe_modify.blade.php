@extends('template.master')

@section('content')

<div class="container">
    <h1>Modifica ricetta</h1>

    {!! Form::model($recipe, array('route' => array('recipe.update', "id"=> $recipe->id ), 'method' => 'PUT', 'id'=>'image-drop', 'enctype'=> 'multipart/form-data') ) !!}


        <div class="col-md-7">

            <div class="form-group">
                {!!  Form::label('Title', 'Titolo') !!}
                {!!  Form::text('title', null, array('class' => 'form-control') ) !!}
            </div>

            <div class="form-group">
                {!!  Form::label('Directions', 'Descrizione') !!}
                {!!  Form::textArea('directions', null, array('class' => 'form-control', 'rows'=>'20')) !!}
            </div>

            <div class="form-group">
                {!!  Form::label('Ingredient', 'Ingredienti') !!}
                <select id="Ingredient" name="ingredient[]" class="js-ingredients form-control">
                    @foreach($ingredients as $ingredient)
                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!!  Form::submit('Modifica', array('class' => 'btn btn-yeah')) !!}
            </div>
        </div>

        <div class="col-md-5">
            {!!  Form::label('image', 'Immagine') !!}
            <div class="form-group upload well">
                {!! Form::file('image', ['id' => 'fallback']) !!}
                <img class="upload-image" src="{{ URL::asset($recipe->image) }}" alt="">
                <h4 class="preview-text" >Clicca qui per aggiungere un immmagine</h4>
            </div>
        </div>

    {!!  Form::close() !!}

    <div style="display:none;" class="hidden-ingredients">
        @foreach($recipe->ingredient as $ingredient)
            <span>{{$ingredient->id}}</span>
        @endforeach
    </div>

</div>

<div class="table table-striped col-md-12 files" id="preview-template" style="display:none;">
    <div id="template">
        <span class="preview"> <img data-dz-thumbnail /></span>
    </div>
</div>

<style>
    .upload-image { max-width:100%!important; display:none;}
    .preview-text {text-align: center;}
    #fallback {width:100%; height:100%; position: absolute; top:0; left:0; opacity:0;}
    .upload {position:relative;}
</style>

    <script>

        (function ($) {

            var ingredients = $(".js-ingredients");

            var selected = [];

            $(".hidden-ingredients span")
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

        (function ($) {

            if($('.upload-image').attr('src')!= '#'){
                $('.preview-text').css('display', 'none');
                $('.upload-image').show();
            }

            $('#fallback').on('change', function(e){
                $('.preview-text').css('display', 'none');
                $('.upload-image').attr('src', URL.createObjectURL(e.target.files[0]) );
                $('.upload-image').show();
            });

        })(jQuery);

    </script>

@endsection
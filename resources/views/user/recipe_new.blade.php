@extends('template.master')

@section('content')

    <div class="container">
        <div class="row">
            <h1>Aggiungi ricetta</h1>

            {!! Form::open(['route' => 'recipe.create', 'method'=> 'post', 'class'=>'form-stripes', 'enctype'=> 'multipart/form-data']) !!}

            <div class="form-group col-md-12">
                {!! Form::label('title', 'Titolo') !!}
                {!! Form::text('title', null, array('class' => 'form-control'))  !!}
            </div>

            <div class="form-group col-md-12">
                {!! Form::label('directions', 'Procedura')  !!}
                {!! Form::textArea('directions', null, array('class' => 'form-control'))  !!}
            </div>

            <div class="form-group col-md-12">
                {!!  Form::label('Ingredient', 'Ingredienti') !!}
                <select id="Ingredient" name="ingredient[]" class="js-ingredients form-control" required="required">
                    <option></option>
                    @foreach($ingredients as $ingredient)
                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5">
                {!!  Form::label('image', 'Immagine') !!}
                <div class=" well">
                    {!! Form::file('image', ['id' => 'fallback']) !!}
                    <img class="upload-image" src="#" alt="">
                    <h4 class="preview-text" >Clicca qui per aggiungere un immmagine</h4>
                </div>
            </div>


            {!!Form::token() !!}

            <div class="col-md-12">
                {!! Form::submit('Aggiungi!', array('class' => 'btn btn-yeah'))  !!}
            </div>

            {!! Form::close() !!}
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

            /* Select2 init */
            $(".js-ingredients").select2({
                theme: 'bootstrap',
                multiple: "multiple",
                tags: true,
                tokenSeparators: [',', ' '],
                placeholder: "Scegli un ingrediente o aggiungine uno nuovo scrivendo direttamente qui dentro e poi premi invio"

            });
            $(".js-ingredients").select2("val", "");

        })(jQuery);

        (function ($) {

            $('#fallback').on('change', function(e){
                $('.preview-text').css('display', 'none');
                $('.upload-image').attr('src', URL.createObjectURL(e.target.files[0]) );
                $('.upload-image').show();
            });

        })(jQuery);

    </script>

@endsection
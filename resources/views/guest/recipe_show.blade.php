@extends('template.master')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="col-md-8">{{$recipe->title}}

                @if(Auth::check())
                    <span class="pull-right">
                        <a class="btn btn-cool" href="{{ URL::route('recipe.modify_page', ["id"=> $recipe->id,]) }}">Modifica</a>

                        {!! Form::open([ 'route' => ['recipe.delete', 'id'=> $recipe->id], 'method'=> 'delete' , 'class'=> "btn btn-yeah delete"]) !!}
                        Elimina
                        {!!Form::token() !!}
                        {!! Form::close() !!}
                    </span>
                @endif

            </h1>
            <h1 class="col-md-4">Ingredienti</h1>
        </div>

        <div class="row">
            <div class="well col-md-8">

                <p>{{$recipe->directions}}</p>

            </div>

            <div class=" col-md-4">

                <ul class="list-group">
                    @foreach($recipe->ingredient as $ingredient)
                        <li class="list-group-item">
                            {{$ingredient->name}}
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
</div>
    <script>

        (function($){

            $('.delete').on('click', function(){
                $(this).submit();
            });

        })(jQuery);

    </script>

@endsection


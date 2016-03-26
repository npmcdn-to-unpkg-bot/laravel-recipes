@extends('template.master')

@section('content')

    <h1>Tutte le ricette</h1>

       @foreach($recipes as $recipe)
           <a href="{{ URL::route('recipe.show_page', ["id"=> $recipe->id]) }}">
               <div class="well">
                   <h2>{{$recipe->title}}</h2>
               </div>

           </a>
       @endforeach

@endsection

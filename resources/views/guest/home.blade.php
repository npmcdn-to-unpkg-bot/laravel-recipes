@extends('template.master')

@section('content')
<div class="container">
    <h1 class="kaushan">Tutte le ricette</h1>
    <div class="row grid" role="masonry-container">

    @foreach($recipes as $recipe)
        <a class="col-sm-4 col-md-3 col-xl-2 grid-item" href="{{ URL::route('recipe.show_page', ["id"=> $recipe->id]) }}">
            <div class="thumbnail" style="padding:0;">
                <img style="width:100%;" src="
                    @if($recipe->image && $recipe->image!= "")
                         {{ URL::asset($recipe->image) }}
                    @else
                         https://s-media-cache-ak0.pinimg.com/236x/3f/ec/cc/3fecccb624df210fe8c71ae649331955.jpg
                    @endif
                        "
                alt="" >
                <div class="caption" >
                    <h4 class="kaushan">{{$recipe->title}}</h4>
                    <p>
                        @foreach($recipe->ingredient->slice(0 ,6) as $ingredient)
                            <span class="stripes"
                                  style="display:inline-block;
                                  margin-bottom:1%; font-style: normal;
                                  text-transform: capitalize; border: solid 1px #bbb;
                                  border-radius:3px; padding:1.5%;

                                  ">
                                <span>{{$ingredient->name}}</span>
                            </span>
                        @endforeach

                    </p>
                </div>
            </div>
        </a>
    @endforeach

    </div>
</div>


    <script>

        var $container = $('.grid');
        $container.imagesLoaded( function () {
            $container.masonry({
                columnWidth: '.grid-item',
                itemSelector: '.grid-item'
            });
        });

    </script>

@endsection

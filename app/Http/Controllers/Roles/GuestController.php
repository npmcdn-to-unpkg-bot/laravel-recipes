<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

use App\Http\Requests;

use App\Http\Controllers\Entities\RecipeController;

class GuestController extends Controller
{

    public function home(){
        
        $recipes = Recipe::all();

        return view("guest.home", ["recipes" => $recipes] );

    }

    public function show_page($id){

        $recipe = Recipe::find($id);
        return view("guest.recipe_show", ["recipe" => $recipe] );
        
    }
    
    public function put($id){
        
        $recipe = Recipe::find($id);
        return view("guest.put", ["recipe" => $recipe] );
        
    }
}

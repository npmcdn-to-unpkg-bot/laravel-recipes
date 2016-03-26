<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Recipe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class UserController extends Controller
{

    public function show_page(){

        return view("user.recipe_new");

    }
    
    public function add_page(){

        return view("user/recipe_new");

    }

    public function modify_page($id){

        $recipe = Recipe::find($id);
        return view("user.recipe_modify", ['recipe' => $recipe]);

    }

    public function recipe_create(){

        $recipe = [
            'title'  => Input::get('title'),
            'directions'  => Input::get('directions')
        ];

        $response = Recipe::create($recipe);

        return $this->modify_page($response->id);

    }

    public function recipe_update($id){

        $recipe = [
            'id'  => $id,
            'title'  => Input::get('title'),
            'directions'  => Input::get('directions')
        ];

        $response = Recipe::where('id', '=', $recipe['id'] )->update($recipe);

        return $this->modify_page($id);

    }

    public function recipe_delete($id){

        $response = Recipe::destroy($id);
        
        return redirect()->route('home');

    }
}

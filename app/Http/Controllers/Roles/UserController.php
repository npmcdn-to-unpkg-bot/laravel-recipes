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
        $ingredients = Ingredient::all();
        return view("user/recipe_new", ['ingredients' => $ingredients]);

    }

    public function modify_page($id){

        $recipe = Recipe::find($id);
        $ingredients = Ingredient::all();

        return view("user.recipe_modify", ['recipe' => $recipe, 'ingredients' => $ingredients]);

    }

    public function recipe_create(Request $request){

        $recipe = [
            'title'  => Input::get('title'),
            'directions'  => Input::get('directions')
        ];

        if( $request->file('image') )
        {
            $image = $request->file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('img/');

            $request->file('image')->move($path, $filename);

            $recipe['image'] = "img/".$filename;
        }

        $recipeEntity = Recipe::create($recipe);

        $this->updateIgredients($recipe, $recipeEntity);

        // Return to home page
        return redirect()->route('home');

    }

    public function recipe_update($id, Request $request){

        $recipe = [
            'id'  => $id,
            'title'  => Input::get('title'),
            'directions'  => Input::get('directions')
        ];

        if( $request->file('image') )
        {

            $image = $request->file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('img/');

            $request->file('image')->move($path, $filename);

            $recipe['image'] = "img/".$filename;
        }


        $recipeEntity = Recipe::where('id', '=', $recipe['id'] )->first();

        $this->updateIgredients($recipe, $recipeEntity);

        // Return to page
        return $this->modify_page($id);

    }



    public function updateIgredients($recipe, $recipeEntity){

        $newIgredient = Input::get('ingredient');

        $updatedIngredient = collect($newIgredient)->map(function($item){

            if( !ctype_digit ( $item )){
                $newIngredient = Ingredient::create(['name'=> $item]);
                return $newIngredient->id;
            }
            return $item;

        })->toArray();

        $recipeEntity->ingredient()->sync($updatedIngredient);

        $response = $recipeEntity->update($recipe);

    }

    public function recipe_delete($id){

        $response = Recipe::destroy($id);

        // Return to home page
        return redirect()->route('home');

    }
}

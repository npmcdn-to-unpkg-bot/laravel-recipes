<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get("/", ["as" => "home", "uses" => "Roles\GuestController@home"]);

    Route::get("ricette/aggiungi", ["as"=>"recipe.add_page", "uses" => "Roles\UserController@add_page"]);
    Route::get("ricette/{id}/modifica", ["as"=>"recipe.modify_page", "uses" => "Roles\UserController@modify_page"]);
    Route::get("ricette/{id}", ["as"=>"recipe.show_page", "uses" => "Roles\GuestController@show_page"]);

    Route::post("ricette", ["as"=>"recipe.create", "uses" => "Roles\UserController@recipe_create"]);
    Route::put("ricette/{id}", ["as"=>"recipe.update", "uses" => "Roles\UserController@recipe_update"]);
    Route::delete("ricette/{id}", ["as"=>"recipe.delete", "uses" => "Roles\UserController@recipe_delete"]);
    
});

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IntialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Recipe table
        Schema::create('recipes', function(Blueprint $table)
        {

            $table->increments('id');

            $table->string('title');
            $table->text("directions");
            $table->string('image');
            $table->integer("user_id");

            $table->timestamps();

        });

        // Ingredients
        Schema::create('ingredients', function(Blueprint $table)
        {

            $table->increments('id');
            $table->string('name');

            $table->timestamps();

        });

        // Recipe Ingredients pivot table
        Schema::create('ingredient_recipe', function(Blueprint $table)
        {
            $table->integer("recipe_id");
            $table->integer("ingredient_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("recipes");
        Schema::drop("ingredients");
        Schema::drop("ingredient_recipe");

    }
}

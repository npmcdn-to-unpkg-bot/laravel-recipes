<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = array('title', 'directions', 'image', 'user_id');

    public function ingredient() {
        return $this->belongsToMany('App\Ingredient');
    }

    public function user() {
        return $this->hasOne('App\User');
    }

}

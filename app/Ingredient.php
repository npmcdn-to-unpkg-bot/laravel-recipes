<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    
    protected $fillable = array('name');

    public function recipe() {
        return $this->belongsToMany('App\Recipe');
    }

}

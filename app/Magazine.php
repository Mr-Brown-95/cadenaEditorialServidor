<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    public function sections(){
        return $this->hasMany(Section::class);
    }
    public function copies(){
        return $this->hasMany(Copy::class);
    }

    public function journalists(){
        return $this->belongsToMany(Journalist::class,'journalist_magazine');
    }
    public function branches(){
        return $this->belongsToMany(Branche::class,'branche_magazine');
    }
}

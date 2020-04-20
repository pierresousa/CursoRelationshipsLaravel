<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];
    //
    public function location(){
        return $this->hasOne(Location::class);
    }

    public function states(){
        return $this->hasMany(State::class);
    }
}

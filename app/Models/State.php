<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class State extends Model
{
    //
    public function country(){
        return $this->belongsTo(Country::class);
    }
}

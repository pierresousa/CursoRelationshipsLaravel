<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    //
    public function oneToMany(){
        //$country = Country::where('name','Brasil')->get()->first();
        $keySearch = "a";
        $countrys = Country::where('name', 'LIKE', "%{$keySearch}%")->get();

        foreach ($countrys as $country) {
            echo "<hr><h2>".$country->name."</h2><hr>";
            $states = $country->states()->get();
            
            foreach ($states as $key) {
                echo $key->initials." - ".$key->name."<br>";
            }
        }
    }
}

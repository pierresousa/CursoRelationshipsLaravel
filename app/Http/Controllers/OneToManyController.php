<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
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
    
    public function oneToManyTwo(){
        //$country = Country::where('name','Brasil')->get()->first();
        $keySearch = "a";
        $countrys = Country::where('name', 'LIKE', "%{$keySearch}%")->get();

        foreach ($countrys as $country) {
            echo "<hr><h2>".$country->name."</h2><hr>";
            $states = $country->states()->get();
            
            foreach ($states as $key) {
                echo $key->initials." - ".$key->name."<br>";
                foreach ($key->cities as $city) {
                    echo "<li>".$city->name."</li>";
                }
            }
        }
    }

    public function oneToManyInverse(){
        $stateName = "Minas Gerais";

        $state = State::where('name', $stateName)->get()->first();
        echo $state->name;

        $country = $state->country;
        echo "<br>".$country->name;
    }

    public function oneToManyInsert(){
        $dataForm = [
            'name'=>'Ceara',
            'initials'=>'CE',
        ];
        $country = Country::find(1);
        $insertState = $country->states()->create($dataForm);
    }
    
    public function oneToManyInsertTwo(){
        $dataForm = [
            'name'=>'Ceara',
            'initials'=>'CE',
            'country_id'=>1,
        ];

        $insertState = State::create($dataForm);
        var_dump($insertState);
    }

    public function hasManyThrough(){
        $country = Country::find(1);

        echo "<b>{$country->name}</b><br>";

        $cities = $country->cities;

        foreach ($cities as $city) {
            echo "<li>{$city->name}</li>";
        }
    }

}

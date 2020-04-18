<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    //
    public function oneToOne(){
        //$country = Country::find(1);
        $country = Country::where('name','China')->get()->first();
        echo $country;

        $location = $country->location;
        echo "<hr>Latitude: ".$location->latitude;
        echo "<br>Longitude: ".$location->longitude;
    }

    public function oneToOneInverse(){
        $latitude = 456;
        $longitude = 654;

        $location = Location::where('latitude',$latitude)->where('longitude',$longitude)->get()->first();

        $country = $location->country;

        echo $location;
        echo "<hr>".$country;
    }

    public function oneToOneInsert(){
        $dataForm = [
            'name' =>'Belgica',
            'latitude' => 555,
            'longitude' => 666,
        ];

        $country = Country::create($dataForm);
        $dataForm['country_id'] = $country->id;
        //dd($dataForm);
        //$location = Location::create($dataForm);
        $location = $country->location()->create($dataForm);

        echo "Foi criado ".$location;
    }
}

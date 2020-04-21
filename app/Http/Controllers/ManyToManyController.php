<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function manyToMany(){
        $city = City::where('name','Belo Horizonte')->get()->first();
        echo $city->name;
        
        $companies = $city->companies;
        foreach ($companies as $company) {
            echo "<li>{$company->name}</li>";
        }
    } 
    public function manyToManyInverse(){
        
        $companies = Company::where('name','iJunior')->get()->first();
        echo "<b>{$companies->name}</b>";
        
        $cities = $companies->cities;

        foreach ($cities as $city) {
            echo "<li>{$city->name}</li>";
        }
    } 

    public function manyToManyInsert(){

        $dataForm = [1,3,4,5,7];

        $company = Company::find(1);

        echo $company->name;

        //$company->cities()->detach($dataForm); para apagar
        //$company->cities()->attach($dataForm);
        $company->cities()->sync($dataForm);
        
        $cities = $company->cities;

        foreach ($cities as $city) {
            echo "<li>{$city->name}</li>";
        }
    }
}

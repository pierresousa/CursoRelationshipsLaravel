<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * One To One
 */
Route::get('one-to-one','OneToOneController@oneToOne');
Route::get('one-to-one-inverse','OneToOneController@oneToOneInverse');
Route::get('one-to-one-insert','OneToOneController@oneToOneInsert');

/**
 * One To Many
 */
Route::get('one-to-many','OneToManyController@oneToMany');
Route::get('one-to-many-two','OneToManyController@oneToManyTwo');
Route::get('one-to-many-inverse','OneToManyController@oneToManyInverse');
Route::get('one-to-many-insert','OneToManyController@oneToManyInsert');
Route::get('one-to-many-insert-two','OneToManyController@oneToManyInsertTwo');
// Route::get('one-to-one-insert','OneToOneController@oneToOneInsert');

/**
 * Has Many Through
 */
Route::get('has-many-through','OneToManyController@hasManyThrough');


/**
 * Many to Many
 */
Route::get('many-to-many','ManyToManyController@manyToMany');
Route::get('many-to-many-inverse','ManyToManyController@manyToManyInverse');
Route::get('many-to-many-insert','ManyToManyController@manyToManyInsert');

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/', function () {
    return view('welcome');
});
//recuperation des fournisseur d'intrant

Route::get('/fss_intrants/index', "FssIntrantController@index");

//recuperation des intrants
Route::get('/intrants/index', "IntrantController@index");

//ids_fss_intrant
Route::get('/ids_fss_intrant/{intrant}', "IdsFssIntrantController@show");

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Locality;
use App\AgeGroup;
use App\Sex;
use App\IndigenousStatus;
use App\Language;
use App\CountryOfBirth;
use App\Person;
use App\CareHome;

use Illuminate\Http\Request;

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

Route::get('/insights', 'InsightController@listLocalities');
Route::post('/insights', 'InsightController@listLocalities');
Route::get('/localities/{locality}', function(Locality $locality) {
    $careHomes = $locality->careHomes;
    $numPatients = $locality->people->count();

    return view('localities.show')->with(compact("locality", "careHomes", "numPatients"));
});

Route::get('/carehomes/{care_home}', function(CareHome $careHome) {
    return view('carehomes.show')->with(compact("careHome"));
});

Route::get("/learn-more", function() {
    return view('learn');
});


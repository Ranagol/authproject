<?php

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



Route::get('/register', 'RegisterController@create');//dovodi do forme za registrovanje

Route::post('/register', 'RegisterController@store');//pise u db, registruje usera

Route::get('/home', 'HomeController@index');//ovo ce prikazati home stranu, posle logovanja, to je ona pocetna strana

Route::get('/login', 'LoginController@create')->name('login');//dovodi do forme za loginblade. Ovde smo nazvali ovu rutu login, kako bi Authenticate.php znao da prebac usera na login blade. Mogli smo da kazemo u Authenticate.php i redirect('/login'), i ovo bi radilo, onda u tom slucaju nam ne treba ->name('login')
Route::post('/login', 'LoginController@store');//ovo salje podatke iz login blade u db

Route::get('/logout', 'LoginController@destroy');//koristimo get metod, jer je jednostavno. Ne saljemo podatke. Get je ovde brzi od post. 

/*
svaki post treba da ima user_id, sto dobijamo od auth()->id. Odraditi komplet relationship.
odraditi rucno login logout register
*/

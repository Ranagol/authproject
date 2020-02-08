<?php

Route::get('/', function () {
    return view('welcome');//for this page the user doesn't need authentication. Login link on this page will get us to the login form. /register url will get us to the form the register.
});

Route::get('/register', 'RegisterController@create');//dovodi do forme za registrovanje

Route::post('/register', 'RegisterController@store');//pise u db, registruje usera

Route::get('/home', 'HomeController@index');//ovo ce prikazati home stranu, posle logovanja, to je ona pocetna strana

Route::get('/login', 'LoginController@create')->name('login');//dovodi do forme za loginblade. Ovde smo nazvali ovu rutu login, kako bi Authenticate.php znao da prebac usera na login blade. Mogli smo da kazemo u Authenticate.php i redirect('/login'), i ovo bi radilo, onda u tom slucaju nam ne treba ->name('login')
Route::post('/login', 'LoginController@store');//ovo salje podatke iz login blade u db

Route::get('/logout', 'LoginController@destroy');//koristimo get metod, jer je jednostavno. Ne saljemo podatke. Get je ovde brzi od post. 



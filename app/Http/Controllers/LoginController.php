<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return view('login.create');//ovo samo dovodi do login forme
    }

    public function store(){//ovo salje podatke u db
        if (!auth()->attempt(//pokusaj autentikaciju sa podacima iz requesta sto je poslato iz forme
            request(['email', 'password'])
        )) {// i ako imamo ne-polapanje sa podacima iz db, vracaj gresku
            return back()->withErrors([
                'message' => 'Bad credentials. Please try again.'
            ]);
        }
        return redirect('/home');//a ako nema greske i autentikacija je uspesna salji usera na home
    }

    public function destroy(){//ovo ne mora da se zove destroy
        auth()->logout();//ovo su built in funkcije, 
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){//ovde registrujemo usera u db
        \Log::info(request());//ovo ce ispisati sve sto se nalazi u requestu
        
        $this->validate(request(), [//OVDE RADIMO VALIDACIJU
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        \Log::info('test');//ovo ce ispisati test u logu, cisto samo da vidimo da li smo stigli do ove linije

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));//ovo radi bajkriptovanje, da kriptuje password koji se skladisti u db
        $user->save();
        \Log::info($user);//ovo ce zapisati sve podatke usera u log, ako se stigne dovde
        auth()->login($user);
        \Log::info($user);//ovo ce zapisati sve podatke usera u log, ako se stigne dovde
        return redirect('/home');
        //upises log kod u kontroller. Otvoris log (storage/logs/laravel.log). Obrisati sve iz njega, nista ove nama ne treba, ovo su samo log zapisi. Refres web stranice. Ubaciti podatke u formu. Submit. Pogledaj log. 
    }
}

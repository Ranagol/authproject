<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        \Log::info(request());//ovo ce ispisati sve sto se nalazi u requestu
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        \Log::info('test');//ovo ce ispisati test u logu

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        \Log::info($user);//ovo ce zapisati sve podatke usera u log, ako se stigne dovde
        auth()->login($user);
        \Log::info($user);//ovo ce zapisati sve podatke usera u log, ako se stigne dovde
        return redirect('/home');
        //upises log kod. Otvoris log. Obrisati sve iz njega. Refres stranice. Ubaciti podatke. Submit. Pogledaj log. 
    }
}

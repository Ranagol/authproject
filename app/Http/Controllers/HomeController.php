<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){//ovaj middleware smo stavili u HomeController, jer ne zelimo da neautentikovan korisnik moze da poseti /home stranicu. Ako je autentikovan, moci ce da poseti home stranicu. Ako nije, ovaj middleware ce poslati korisnika na login page.Gde ce korisnik da se salje, to se namesta u Authenticate.php
        $this->middleware('auth');
    }



    public function index()
    {
        return view('welcome');
    }
}

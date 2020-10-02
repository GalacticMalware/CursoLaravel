<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Invitado extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','roles:Admin']);
    }

    public function index()
    {
        return view('invitado');
    }

    
}

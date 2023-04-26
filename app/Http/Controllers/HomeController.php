<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* El constructor es el primer método que se ejecuta dentro de esa clase, es
    el primer método que se ejecuta y se suele utilizar para inicializar propiedades.
    Es decir, para darle un valor a diferentes propiedades que pueda tener ese objeto */
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}

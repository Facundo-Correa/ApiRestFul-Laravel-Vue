<?php

namespace App\Http\Controllers;

use App\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        return $this->showAll(Seccion::all());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Seccion $seccion)
    {
        //
    }

    public function update(Request $request, Seccion $seccion)
    {
        //
    }

    public function destroy(Seccion $seccion)
    {
        //
    }
}

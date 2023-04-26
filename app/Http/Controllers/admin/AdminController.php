<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function admin()
    {
        if (!env('APP_DEBUG') && !env('ADMIN_RECIPIENT'))
            return $this->errorResponse('ADMIN_RECIPIENT variable undefined',403);

        return view('admin.admin');
    }

    public function clientes()
    {
        if (!env('APP_DEBUG') && !env('ADMIN_RECIPIENT'))
            return $this->errorResponse('ADMIN_RECIPIENT variable undefined',403);

        return view('admin.components.clientes.clientes');
    }
}

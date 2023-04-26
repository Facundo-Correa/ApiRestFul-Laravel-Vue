<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class IndexController extends Controller
{
    public function index()
    {
        if (!env('APP_DEBUG') && !env('ADMIN_RECIPIENT'))
            return $this->errorResponse('ADMIN_RECIPIENT variable undefined',403);

        return view('index');
    }
}


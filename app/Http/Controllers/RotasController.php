<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RotasController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function favorito() {
        return view('favorito.dashboard');
    }

    public function admin() {
        return view('crud');
    }
}

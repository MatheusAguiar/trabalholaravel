<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
{
    public function index(){

        $usuarios = Usuario::orderBy('nome')->get();

        return view('site.usuarios.index', compact('usuarios'));
    }
}

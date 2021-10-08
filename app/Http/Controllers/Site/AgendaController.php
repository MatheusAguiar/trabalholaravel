<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Agendamento;

class AgendaController extends Controller
{
   public function index($idUsuario){

        $usuario = Usuario::find($idUsuario);

        $agendamentos = Agendamento::with(['medico', 'clinica'])->where('usuario_id', $idUsuario)
        ->paginate(env('PAGINACAO'));

        return view('site.usuarios.agendamentos.index', compact('usuario', 'agendamentos'));

   }
}

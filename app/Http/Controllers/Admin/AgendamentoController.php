<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AgendamentoRequest;
use App\Models\Usuario;
use App\Models\Clinica;
use App\Models\Medico;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agendamentos = Agendamento::with('medico');
         
        $medico_id = $request->medico_id;
        $motivo = $request->motivo;

        if($request->medico_id){
            $agendamentos->where('medico_id', $medico_id);
        }

        if($request->motivo){
            $agendamentos->where('motivo', 'like', "%$motivo%");
        }

        $agendamentos = $agendamentos->paginate(env('PAGINACAO'))->withQueryString();        

        $medicos = Medico::orderBy('nome')->get();

        return view('admin.agendamentos.index', compact('agendamentos','medicos', 'medico_id', 'motivo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $clinicas = Clinica::all();
        $medicos = Medico::all();
        $action = route('agendamentos.store');
        return view('admin.agendamentos.form', compact('action','usuarios','clinicas','medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendamentoRequest $request)
    {
         Agendamento::create($request->all());

         $request->session()->flash('sucesso', "Agendado com sucesso");
         return redirect()->route('agendamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agendamento = Agendamento::find($id);

        return view('admin.agendamentos.show', compact('agendamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agendamento = Agendamento::find($id);

        $usuarios = Usuario::all();
        $clinicas = Clinica::all();
        $medicos = Medico::all();
        $action = route('agendamentos.update', $agendamento->id);
        return view('admin.agendamentos.form', compact('agendamento','action','usuarios','clinicas','medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendamentoRequest $request, $id)
    {
        $agendamento = Agendamento::find($id);

        $agendamento->update($request->all());

        $request->session()->flash('sucesso', "Agendamento atualizado com sucesso");
        return redirect()->route('agendamentos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Agendamento::destroy( $id);
        $request->session()->flash('sucesso', "Agendamento desmarcado com sucesso");
        return redirect()->route('agendamentos.index');

    }
}

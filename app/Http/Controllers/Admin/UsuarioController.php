<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Image;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = 'Lista de Usuários';
        $usuarios = Usuario::orderBy('nome','asc')->get();
        return view('admin.usuarios.index',compact('subtitulo','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('usuarios.store');
        return view('admin.usuarios.form',compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        if($request->hasFile('foto')){

            if($request->foto->isValid()){

             $fotoURL = $request->foto->hashName("usuarios/users");

             $imagem = Image::make($request->foto)->fit(env('FOTO_LARGURA'),env('FOTO_ALTURA'));

             Storage::disk('public')->put($fotoURL, $imagem->encode());

            $request->url = $fotoURL;

            }

            Usuario::create([
                'nome' => $request->nome,
                'idade' => $request->idade,
                'peso' => $request->peso,
                'url' => $request->url,

            ]);
        }
       
        $request->session()->flash('sucesso', "Usuário $request->nome incluido com sucesso");
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $action = route('usuarios.update',$usuario->id);
        return view('admin.usuarios.form',compact('usuario','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->update($request->all());

        $request->session()->flash('sucesso',"Usuário $request->nome alterado(a) com sucesso");
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Usuario::destroy($id);
        $request->session()->flash('sucesso',"Usuário excluido com sucesso");
        return redirect()->route('usuarios.index');
    }
}

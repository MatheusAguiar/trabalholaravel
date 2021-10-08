<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FotoRequest;
use App\Models\Usuario;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
use Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUsuario)
    {
        $usuario = Usuario::find($idUsuario);
        $fotos = Foto::where('usuario_id', '=', $idUsuario)->get();
        return view('admin.usuarios.fotos.index', compact('usuario','fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUsuario)
    {
        $usuario = Usuario::find($idUsuario);

        return view('admin.usuarios.fotos.form', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoRequest $request, $idUsuario)
    {
        if($request->hasFile('foto')){

            if($request->foto->isValid()){

             $fotoURL = $request->foto->hashName("usuarios/$idUsuario");

             $imagem = Image::make($request->foto)->fit(env('FOTO_LARGURA'),env('FOTO_ALTURA'));

             Storage::disk('public')->put($fotoURL, $imagem->encode());

              $foto = new Foto();
              $foto->url = $fotoURL;
              $foto->usuario_id = $idUsuario;
              $foto->save();

            }
        }
        $request->session()->flash('sucesso', 'Foto incluida com sucesso');
        return redirect()->route('usuarios.fotos.index',$idUsuario);
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idUsuario, $idFoto)
    {
        $foto = Foto::find($idFoto);

        Storage::disk('public')->delete($foto->url);

        $foto->delete();
        $request->session()->flash('sucesso', 'Foto excluída com sucesso');
        return redirect()->route('usuarios.fotos.index',$idUsuario);

    }
}

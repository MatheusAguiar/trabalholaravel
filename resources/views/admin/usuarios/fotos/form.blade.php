@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">

    <form action="{{route('usuarios.fotos.store', $usuario->id)}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="file-field input-field">
            <div class="btn">
                <span>Selecionar Fotos</span>
                <input type="file" name="foto" />
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path validate" />
            </div>
        </div>
        @error('foto')
        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
        @enderror

    <div class="right-align">
        <a href="{{url()->previous()}}" class="btn-flat waves-effect">Cancelar</a>
        <button class="btn waves-effect waves-light" type="submit">Salvar</button>
    </div>

    </form>
</section>

@endsection
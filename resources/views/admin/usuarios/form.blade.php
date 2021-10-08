@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">

    
    <form action="{{$action}}" enctype="multipart/form-data" method="POST" >

    @csrf

         @isset($usuario)

         @method('PUT')

    @endisset

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome', $usuario->nome ?? '' )}}" />
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
                </div>

                <div class="input-field">
                <input type="text" name="idade" id="idade" value="{{old('idade', $usuario->idade ?? '' )}}" />
                <label for="idade">Idade</label>
                @error('idade')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
                </div>

                <div class="input-field">
                <input type="text" name="peso" id="peso" value="{{old('peso', $usuario->peso ?? '' )}}" />
                <label for="peso">Peso</label>
                @error('peso')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
                </div>

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
                <a class="btn-flat waves-effect" href="{{route('usuarios.index')}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                Salvar
                </button>
            </div>

        </form>

    </section>

@endsection
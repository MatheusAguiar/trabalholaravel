@extends('admin.layouts.principal')

@section('conteudo-principal')
<h2>{{$usuario->nome}}</h2>

<section class="section">

<div class="flex-container">

@forelse($fotos as $foto)

<div class="flex-item">

    <span class="fechar">

    <form action="{{route('usuarios.fotos.destroy', [$usuario->id, $foto->id])}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                            <button style="border:0;background:transparent;" type="submit" title="remover">
                                
                                     <span style="cursor:pointer">
                                          <i class = "material-icons red-text text-accent-3">delete_forever</i>
                                      </span>                                
                                </button>                                
                         </form>          
    </span>

    <img src="{{asset("storage/$foto->url")}}" width="150" height="100" />

 

</div>

@empty
<div>Não existem fotos para este usuário</div>
@endforelse

</div>

<div class="fixed-action-btn">
    <a href="{{route('usuarios.fotos.create', $usuario->id)}}" class="btn-floating btn-large waves-effect waves-light">
        <i class="large material-icons">add</i>
    </a>
</div>

</section>
@endsection
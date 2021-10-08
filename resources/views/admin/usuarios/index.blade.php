@extends('admin.layouts.principal')

@section('conteudo-principal')



    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Peso</th>
                    <th class="right-align"> Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->idade}}</td>
                        <td>{{$usuario->peso}}</td>
                        <td class="right-align"> 


                        <a href="{{route('usuarios.edit', $usuario->id)}}">
                        <span>
                                <i class = "material-icons blue-text text-accent-2">edit</i>
                        </span>
                        </a>

                        <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                            <button style="border:0;background:transparent;" type="submit">
                                
                                     <span style="cursor:pointer">
                                          <i class = "material-icons red-text text-accent-3">delete_forever</i>
                                      </span>                                
                                </button>                                
                         </form>  

                        </td>
                    </tr>
                @empty
                <tr>

                    <td colspan="2">Nao existem usuario cadastrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{route('usuarios.create')}}">
            <i class="large material-icons">add</i>
            </a>
        </div>

     

    </section>

@endsection

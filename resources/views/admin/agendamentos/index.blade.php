@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">

<form action="{{route('agendamentos.index')}}" method="GET">

    <div class="row valign-wrapper">
        <div class="input-field col s6">
            <select name="medico_id" id="medico">
                <option value="">Selecione um médico</option>
                @foreach($medicos as $medico)
                <option value="{{$medico->id}}" {{$medico->id == $medico_id ? 'selected' : ''}}>{{$medico->nome}}</option>

                @endforeach

            </select>
        </div>

        <div class="input-field col s6">
            <input type="text" name="motivo" id="motivo" value="{{$motivo}}">
            <label for="motivo">Motivo</label>
        </div>

    </div>

    <div class="row right-align">
        <a href="{{route('agendamentos.index')}}" class="btn flat waves-effect">
            Exibir Todos
        </a>
        <button type="submit" class="btn waves-effect waves-light">
            Pesquisar
        </button>
    </div>

</form>

</section>

<hr />

<section class="section">


    <table class="hightlight">

        <thead>
            <tr>
                <th>Data</th>
                <th>Horário</th>
                <th>Motivo</th>
                <th>Médico</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>

        <tbody>

            @forelse($agendamentos as $agendamento)
            <tr>
                <td>{{$agendamento->data}}</td>
                <td>{{$agendamento->horario}}</td>
                <td>{{$agendamento->motivo}}</td>
                <td>{{$agendamento->medico->nome}}</td>
                <td class="right-align">

                    <a href="{{route('agendamentos.show', $agendamento->id)}}" title="visualizar">
                             <span>
                                <i class = "material-icons indigo-text text-darken-2">remove_red_eye</i>
                            </span>
                   
                     <a href="{{route('agendamentos.edit', $agendamento->id)}}">
                        <span>
                                <i class = "material-icons blue-text text-accent-2">edit</i>
                        </span>

                    <form action="{{route('agendamentos.destroy', $agendamento->id)}}" method="POST" style="display:inline;">
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
                    <td colspan="4">Não existem agendamentos ou agendamentos que atendam os critérios de pesquisa</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="center">

        {{$agendamentos->links('shared.pagination')}}

    </div>

    <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{route('agendamentos.create')}}">
            <i class="large material-icons">add</i>
            </a>
     </div>

     

</section>

@endsection
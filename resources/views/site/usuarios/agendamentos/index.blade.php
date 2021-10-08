@extends('site.layouts.principal')

@section('conteudo-principal')

   <h3>Agendamentos marcados para {{$usuario->nome}}</h3> 

   <div class="divider"></div>

   <div style="display: flex; flex-wrap: wrap">

    @forelse($agendamentos as $agendamento)

    <div class="card" style="width: 290px; margin: 10px;">

        <div class="card-image">

      
        <img src="{{asset("storage/{$usuario->url}")}}" />

       

        </div>  
        
        <div class="card-content">

            <p class="card-title">
                Paciente: {{$usuario->nome}}
            </p>

            <p>
                Data do Atendimento <strong>{{$agendamento->data}}</strong>
            </p>

            <p>
                Horário: <strong>{{$agendamento->horario}}</strong>
            </p>

            <p>
                Médico Responsável: <strong>{{$agendamento->medico->nome}}</strong>
            </p>

            <p>
                Clínica: <strong>{{$agendamento->clinica->nome}}</strong>
            </p>

            <p>
                Motivo: <strong>{{$agendamento->motivo}}</strong>
            </p>

        </div>

    </div>

    @empty
    <p>Não Existem agendamentos para este usuário</p>
    @endforelse

</div>
@endsection
@extends('admin.layouts.principal')

@section('conteudo-principal')



<section class="section">

<table class="striped">

<thead>
    <tr>
        <th>Data</th>
        <th>Horário</th>
        <th>Motivo</th>
        <th>Médico</th>
        <th>Paciente</th>
        <th>Clínica</th>
    </tr>
</thead>

    <tbody>     

    
        <tr>
         <td>{{$agendamento->data}}</td>
         <td>{{$agendamento->horario}}</td>
         <td>{{$agendamento->motivo}}</td>
         <td>{{$agendamento->medico->nome}}</td>
         <td>{{$agendamento->usuario->nome}}</td>
         <td>{{$agendamento->clinica->nome}}</td>

        </tr>   

    </tbody>
</table>


    <div class ="right-align">
        <a href="{{url()->previous()}}" class ="btn-flat waves-effect">Voltar</a>
    </div>    
    
</section>
@endsection
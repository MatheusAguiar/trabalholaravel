@extends('site.layouts.principal')

@section('conteudo-principal')

<section class="section lighten-4 center">

    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">

        @foreach ($usuarios as $usuario)

        <a href="{{route('usuarios.agendamentos.index', $usuario->id)}}">
            
             <div class="card-panel" style="width: 280px; height: 90%;">
                 <i class="material-icons medium green-text text-lighten-3">person</i>
                 <h4 class="black-text">{{$usuario->nome}}</h4>
            </div>
        </a>
        @endforeach
    </div>  
</section>

@endsection

@section('slider')

    <section class="slider">

        <ul class="slides">

            <li>
                <img src="https://source.unsplash.com/tE6th1h6Bfk/1900x600" />
                <div class="caption center-align">
                   <h2 style="text-shadow: 2px 2px 8px #1b5e20;">Agende sua consulta</h2> 
                </div>
            </li>

            <li>
                <img src="https://source.unsplash.com/nF8xhLMmg0c/1900x600" />
                <div class="caption left-align">
                   <h2 style="text-shadow: 2px 2px 8px #1b5e20;">Várias clínicas credenciadas</h2> 
                </div>
            </li>

            <li>
                <img src="https://source.unsplash.com/hIgeoQjS_iE/1900x600" />
                <div class="caption right-align">
                   <h2 style="text-shadow: 2px 2px 8px #1b5e20;">Os melhores profissionais do mercado</h2> 
                </div>
            </li>

        </ul>

    </section>

@endsection
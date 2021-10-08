@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class = "section">
        <form action = "{{$action}}" method = "POST">
             @csrf

             @isset($agendamento)
                @method('PUT')
            @endisset

        <div class="row">
            <div class = "input-field col s12">
                <input type="date" name="data" id="data" value="{{old('data', $agendamento->data ?? '')}}" />
                <label for="data">Data do Atendimento</label>
                @error('data')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class = "input-field col s12">
                <input type="text" name="horario" id="horario" value="{{old('horario', $agendamento->horario ?? '')}}" />
                <label for="data">Horário do Atendimento</label>
                @error('horario')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <textarea name="motivo" id="motivo" class="materialize-textarea">{{old('motivo', $agendamento->motivo ?? '')}}</textarea>
                    <label for="motivo">Motivo</label>
                    @error('motivo')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                     @enderror                    
            </div>
        </div>

        <div class="row">
            <div class = "input-field col s12">
                <select name="usuario_id" id="usuario_id">
                    <option value="" disabled selected> Selecione um Paciente</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{$usuario->id}}"
                            {{old('usuario_id', $agendamento->usuario->id ?? '') == $usuario->id ? 'selected' : '' }}
                            >{{$usuario->nome}}</option>
                    @endforeach    
                </select>
                <label for="usuario_id">Paciente</label>
                @error('usuario_id')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class = "input-field col s12">
                <select name="medico_id" id="medico_id">
                    <option value="" disabled selected> Selecione um Médico</option>
                    @foreach ($medicos as $medico)
                        <option value="{{$medico->id}}"
                            {{old('medico_id', $agendamento->medico->id ?? '') == $medico->id ? 'selected' : '' }}
                            >{{$medico->nome}}</option>
                    @endforeach    
                </select>
                <label for="medico_id">Médico</label>
                @error('medico_id')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>
        

        <div class="row">
            <div class = "input-field col s12">
                <select name="clinica_id" id="clinica_id">
                    <option value="" disabled selected> Selecione uma Clínica</option>
                    @foreach ($clinicas as $clinica)
                        <option value="{{$clinica->id}}"
                            {{old('clinica_id', $agendamento->clinica->id ?? '') == $clinica->id ? 'selected' : '' }}
                            >{{$clinica->nome}}</option>
                    @endforeach    
                </select>
                <label for="clinica_id">Clínica</label>
                @error('clinica_id')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
        </div>
        
        <div class="right-align">
                <a class="btn-flat waves-effect" href="{{route('agendamentos.index')}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                Salvar
                </button>
        </div>

        </form>
</section>

@endsection
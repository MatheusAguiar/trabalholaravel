
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Compiled and minified CSS -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/fotos.css')}}"> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Página Principal</title>
</head>
<body>
    {{-- Menu Topo --}}
    <nav class="teal lighten-2">
        <div class="container">
            <div class="nav-wrapper ">
                <a href="#!" class="brand-logo"><i class="large material-icons">format_clear</i>Clínica</a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="{{route('agendamentos.index')}}">Agendamentos</a>
                    </li>

                    <li>
                        <a href="{{route('usuarios.index')}}">Cadastrar Usários</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

      {{-- Conteudo Principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>



  <!-- Compiled and minified JavaScript -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script>
    
    @if(session('sucesso'))
     
        M.toast({html: "{{session('sucesso')}}"});

     @endif

     document.addEventListener('DOMContentLoaded', function() {
         var elems = document.querySelectorAll('select');
         var instances = M.FormSelect.init(elems);
     });

    </script>
   
</body>
</html>

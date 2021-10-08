
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Compiled and minified CSS -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Página Principal</title>
</head>
    <body>
        {{-- Menu Topo --}}
        <nav>
            <div class="container">
                <div class="nav-wrapper ">
                    <a href="/" class="brand-logo center"><i class="large material-icons">format_clear</i>Clínica</a>
                
                </div>
            </div>
        </nav>

        @yield('slider')

        {{-- Conteudo Principal --}}
        <div class="container">
            @yield('conteudo-principal')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function(){

            var sliders = document.querySelectorAll('.slider');
            M.Slider.init(sliders, {
                indicators: false,
                height: 400,
                
            });
        });
     </script>

    </body>
</html>

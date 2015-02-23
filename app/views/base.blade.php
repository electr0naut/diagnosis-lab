<!doctype html>
<html lang="en">

<head>

    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/bootstrap-theme.min.css')}}
    {{HTML::script('js/bootstrap.min.js')}}

    <meta charset="UTF-8">
    <title>Testing grounds</title>

    <body>
        <div class='container-fluid'>
            <div class='col-md-1'>
                {{ link_to_route('especies.index', 'Especies') }}
            </div>
            <div class='col-md-1'>      
                {{ link_to_route('razas.index', 'Razas') }}
            </div>
            <div class='col-md-1'>      
                {{ link_to_route('contactos.index', 'Contactos') }}
            </div>
            <div class='col-md-1'>      
                {{ link_to_route('entidades.index', 'Entidades') }}
            </div>
            <div class='col-md-1'>      
                {{ link_to_route('diagnosticos.index', 'Diagnosticos') }}
            </div>
            <div class='col-md-1'>      
                {{ link_to_route('muestras.index', 'Muestras') }}
            </div>
            <div class='col-md-1'>      
                {{ link_to_route('informes.index', 'Informes') }}
            </div>
            <div class='col-md-2'>      
                {{ link_to_route('formapago.index', 'Formas de Pago') }}
            </div>
            <div class='col-md-1'>      
                {{ link_to_route('usuarios.index', 'Usuarios') }}
            </div>                        
        </div>        
        <div class="container">

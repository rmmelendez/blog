{{-- {{ dd( auth()->user()->roles->toArray() ) }} Se utiliza para ver el resultado de la consulta--}}

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/app.css">
        <title>Mi sitio</title>
    </head>
    <body>
        <header>
            <!-- <h1>{{ request()->is('/') ? 'Estás en el home' : 'No estás en el home' }}</h1> -->

            <?php function activeMenu($url){
                return request()->is($url) ? 'active' : '';
            } ?>


  <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="{{ activeMenu('/')}}" href="{{ route('home') }}">Inicio</a>
                <a class="{{ activeMenu('saludos*') }}" href="{{ route('saludos', 'Raul') }}">Saludo</a>
                <a class="{{ activeMenu('messages/create') }}" href="{{ route('messages.create') }}">Contactos</a>

                @if(auth()->check())
                    <a class="{{ activeMenu('messages*') }}" href="{{ route('messages.index') }}">Mensajes</a>

                        @if(auth()->user()->hasRoles(['admin']))
                            <a class="{{ activeMenu('usuarios*') }}" href="{{ route('usuarios.index') }}">Usuarios</a>
                        @endif

                @endif

                @if(auth()->guest())
                        <a class="{{ activeMenu('login') }}" href="/login">Login</a>
                    @else
                        <a href="/logout">Cerrar sesion de
                             <strong>{{ auth()->user()->name }}</strong> </a> 
                        <a href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
                @endif
                
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>  



        </header>
        
        <div class="container">

            <!-- Este es el espacio no común de cada vista  -->
              @yield('contenido')
              
              <p></p>

            <footer>Copyrigth ® {{ date('Y') }}</footer>
        </div>
    </body>
</html>



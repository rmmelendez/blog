@extends('layout')

@section('contenido')

    <h1>Hola {{ $nombre }}, te saludamos desde "saludos.php" </h1>
    <ul>
            @forelse ($consolas as $consola)
            <li><h3>{{ $consola }}</h3></li>
            @empty
            <h2>No hay consolas :(</h2>
            @endforelse
    </ul>
@stop




<!--
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Saludos</title>       
    </head>
    <body>
        <h1>Hola <?php echo $nombre;?>, te saludamos desde "saludos.php" </h1>


        <?php //Sintaxis con Blade para imprimir el valor de una variable ?>
        <h1>Hola {{ $nombre }}, te saludamos desde "saludos.php" </h1> 

            <header>
                <nav>
                    <a href="<?php echo route('home')?>">Inicio</a>
                    <a href="<?php echo route('saludos', 'Raul')?>">Saludo</a>
                    <a href="<?php echo route('messages.create')?>">Contacto</a>
                </nav>
            </header>
    </body>
</html>
-->

@extends('layout')

@section('contenido')

    <h1>Home</h1>

    @if(session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

@stop



<!--
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>       
    </head>
    <body>
        <h1>Home</h1>
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
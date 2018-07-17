@extends('layout')

@section('contenido')

    <h1>Este es el mensaje:</h1>

    <p>Enviado por: {{ $mensaje->nombre }} - {{ $mensaje ->email }} - {{ $mensaje->telefono }}</p>

    <p>Mensaje: {{ $mensaje->mensaje }}</p>

@stop

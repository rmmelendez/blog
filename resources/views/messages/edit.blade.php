@extends('layout')

@section('contenido')

    <h1>Editar mensaje</h1>

    <form method="POST" action="{{ route('messages.update', $dato->id) }}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <p><label for="nombre">
                Nombre
                <input class="form-control" type="text" name="nombre" value='{{ $dato->nombre }}'>
                {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
            </label></p>
            <p><label for="email">
                Email
                <input class="form-control" type="email" name="email" value='{{ $dato->email }}'>
                {!! $errors->first('email','<span class=error>:message</span>') !!}
            </label></p>
            <p><label for="telefono">
                Telefono
                <input class="form-control" type="text" name="telefono" value='{{ $dato->telefono }}'>
                {!! $errors->first('telefono','<span class=error>:message</span>') !!}
            </label></p>
            <p><label for="mensaje">
                Mensaje
                <textarea class="form-control" name="mensaje">{{ $dato->mensaje }}</textarea>
                {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
            </label></p>
            <input class="btn btn-primary" type="submit" value="Enviar">
            <a href="{{ route('messages.index') }}"><input class="btn btn-primary" type="button" value="Cancelar"></a>
    </form>

@stop
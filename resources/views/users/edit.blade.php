@extends('layout')

@section('contenido')

    <h1>Editar usuario</h1>

    @if(session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <p><label for="name">
                Nombre
                <input class="form-control" type="text" name="name" value='{{ $user->name }}'>
                {!! $errors->first('name', '<span class=error>:message</span>') !!}
            </label></p>
            <p><label for="email">
                Email
                <input class="form-control" type="email" name="email" value='{{ $user->email }}'>
                {!! $errors->first('email','<span class=error>:message</span>') !!}
            </label></p>
            <input class="btn btn-primary" type="submit" value="Enviar">
            <a href="{{ route('usuarios.index') }}"><input class="btn btn-primary" type="button" value="Cancelar"></a>
    </form>

@stop
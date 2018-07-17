@extends('layout')

@section('contenido')

    <h1>Todos los mensajes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Mensaje</th>
                <th width="170px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mensajes as $mensaje)
            <tr>
                <td>{{ $mensaje->id }}</td>

                @if($mensaje->user_id)
                    <td><a href="{{ route('usuarios.show', $mensaje->user_id) }}">
                    {{ $mensaje->user->name }}</a></td>
                    <td>{{ $mensaje->user->email }}</td>
                    <td>{{ $mensaje->telefono }}</td>
                @else
                    <td>{{ $mensaje->nombre }}</td>
                    <td>{{ $mensaje->email }}</td>
                    <td>{{ $mensaje->telefono }}</td>
                @endif

                <td>
                    <a href="{{ route('messages.show', $mensaje->id) }}">
                    {{ $mensaje->mensaje }}</td>
                    </a>
                <td>
                    <a class="btn btn-info btn-sm" style="display:inline" href="{{ route('messages.edit', $mensaje->id) }}">Editar</a>
                    <form class="form-inline" method="POST" style="display:inline" action=" {{ route('messages.destroy', $mensaje->id) }}">
                            {!! csrf_field() !!}    
                            {!! method_field('DELETE') !!}
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop

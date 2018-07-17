@extends('layout')

@section('contenido')

    <h1>Usuarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th width="170px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('usuarios.show', $user->id) }}">
                        {{ $user->name }}
                    </a> 
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    
                    {{--ESTE METODO SUSTITUYE AL FOREACH DE ABAJO (hace lo mismo) --}}
                    {{ ($user->roles->pluck('display_name')->implode(' | ')) }}

                    {{--  @foreach($user->roles as $role)
                            | {{ $role->display_name }} | &nbsp; &nbsp;
                        @endforeach --}}

                </td>
                <td>
                    <a class="btn btn-info btn-sm" style="display:inline" href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
                    <form class="form-inline" method="POST" style="display:inline" action=" {{ route('usuarios.destroy', $user->id) }}">
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
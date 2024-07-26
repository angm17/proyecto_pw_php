@extends('plantilla.plantilla')
@section('contenido')

<hr>
<a href="usuario_rol/nuevo" class="btn btn-primary">Nuevo Rol de Usuario</a>
<div class="table-responsive">

<table id="listado" class="table table-border table-striped" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre de usuario</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead> 
    <tbody>
        @foreach($usuario_rol as $usuario_rol)
            <tr>
                <td>{{$usuario_rol->id}}</td>
                <td>{{$usuario_rol->usuario->nombre}}</td>
                <td>{{$usuario_rol->rol->descripcion}}</td>
                <td>
                    <a class="btn btn-primary" href="/rolusuarios/{{$usuario_rol->id}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form method="post" action="/usuario_rol/{{$usuario_rol->id}}/eliminar">
                        @csrf
                        <button type="submit" class="btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
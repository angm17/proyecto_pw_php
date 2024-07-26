@extends('plantilla.plantilla')
@section('contenido')
<h1> Listado de Usuarios </h1>

<hr>
<a href="usuarios/nuevo" class="btn btn-primary">Nuevo Usuario</a>
<div class="table-responsive">

<table id="listado" class="table table-border table-striped" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->estado}}</td>
                <td>
                    <a class="btn btn-primary" href="/usuarios/{{$usuario->id}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form method="post" action="/usuarios/{{$usuario->id}}/eliminar">
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
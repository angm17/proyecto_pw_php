@extends('plantilla.plantilla')
@section('contenido')
<h1> Listado de Roles </h1>

<hr>
<a href="/rol/nuevo" class="btn btn-primary">Nuevo rol</a>
<hr>
<div class="table-responsive">

<table id="listado" class="table table-border table-striped" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rol as $rol)
            <tr>
                <td>{{$rol->id}}</td>
                <td>{{$rol->descripcion}}</td>
                <td>{{$rol->estado}}</td>
                <td>
                    <a class="btn btn-primary" href="/rol/{{$rol->id}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form method="post" action="/rol/{{$rol->id}}/eliminar">
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
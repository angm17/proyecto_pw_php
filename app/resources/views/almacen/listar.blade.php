@extends('plantilla.plantilla')
@section('contenido')
<h1> Listado de Almacenes </h1>

<hr>
<a href="/almacen/nuevo" class="btn btn-primary">Nuevo Almacen</a>
<hr>
<div class="table-responsive">

<table id="listado" class="table table-border table-striped" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($almacen as $almacen)
            <tr>
                <td>{{$almacen->id}}</td>
                <td>{{$almacen->nombre}}</td>
                <td>{{$almacen->estado}}</td>
                <td>
                    <a class="btn btn-primary" href="/almacen/{{$almacen->id}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form method="post" action="/almacen/{{$almacen->id}}/eliminar">
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
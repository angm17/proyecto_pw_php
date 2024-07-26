@extends('plantilla.plantilla')

@section('contenido')

<h1> Listado de stock </h1>

<div class="table-responsive">

<table id="listado" class="table table-border table-striped" style="width:100%">
    <thead>
        <tr>
            <th> Codigo </th>
            <th> Producto </th>
            <th> Unidad </th>
            <th> Categoria </th>
            <th> Stock </th>
            <th> Costo Promedio </th>
            <th> Costo Total </th>
        </tr>
    </thead>
    <tbody>
        @if (count($productos) > 0)
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->unidad->descripcion }}</td>
                    <td>{{ $producto->categoria->descripcion }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->costoPromedio }}</td>
                    <td>{{ $producto->costoTotalStock }}</td>
                    
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td colspan="7">Sin registros...</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
@endsection
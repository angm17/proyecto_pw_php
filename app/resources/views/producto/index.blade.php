@extends('plantilla.plantilla')

@section('contenido')

<h1> Listado de Productos </h1>
<div class="row pb-2">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block"  href="/producto/crear"><i
                class="fa-solid fa-plus"></i> Agregar</a>
    </div>
</div>
<hr>
<div class="table-responsive">

<table id="listado" class="table table-border table-striped" style="width:100%">
    <thead>
        <tr>
            <th> # </th>
            <th> Nombre </th>
            <th> Categoría </th>
            <th> Unidad </th>
            <th> Precio </th>
            <th> Estado </th>
            <th> Acciones </th>
        </tr>
    </thead>
    <tbody>
        @if (count($productos) > 0)
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->categoria->descripcion }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>
                        @if ($producto->estado)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </td>               
                    <td>
                        <a class="btn btn-primary" href="/producto/{{ $producto->id }}/editar"><i class="fa-solid fa-pen-to-square"></i></a> 

                        <form action="/producto/{{ $producto->id }}/eliminar" method="post">
                        @csrf
                            <button type="submit" class="btn {{ $producto->estado ? 'btn-danger' : 'btn-success' }}">
                                @if ($producto->estado)
                                    <i class="fa-solid fa-trash"></i>
                                @else
                                    <i class="fa-regular fa-square-check"></i>
                                @endif
                            </button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td colspan="4">Sin registros...</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
@endsection
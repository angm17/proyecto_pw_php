@extends('plantilla.plantilla')

@section('contenido')

<h1> Listado de Categorías de Productos </h1>
<div class="row pb-2">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block"  href="/categoria-producto/crear"><i
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
            <th> Estado </th>
            <th> Acciones </th>
        </tr>
    </thead>
    <tbody>
        @if (count($categoriaproductos) > 0)
            @foreach ($categoriaproductos as $categoria_producto)
                <tr>
                    <td>{{ $categoria_producto->id }}</td>
                    <td>{{ $categoria_producto->descripcion }}</td>
                    <td>
                        @if ($categoria_producto->estado)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </td>               
                    <td>
                        <a class="btn btn-primary" href="/categoria-producto/{{ $categoria_producto->id }}/editar"><i class="fa-solid fa-pen-to-square"></i></a> 

                        <form action="/categoria-producto/{{ $categoria_producto->id }}/eliminar" method="post">
                        @csrf
                            <button type="submit" class="btn {{ $categoria_producto->estado ? 'btn-danger' : 'btn-success' }}">
                                @if ($categoria_producto->estado)
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
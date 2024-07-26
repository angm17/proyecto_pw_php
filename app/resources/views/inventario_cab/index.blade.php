@extends('plantilla.plantilla')

@section('contenido')

<h1> Listado de Inventario Cabecera </h1>
<div class="row pb-2">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block"  href="/inventario/crear"><i
                class="fa-solid fa-plus"></i> Agregar</a>
    </div>
</div>
<hr>
<div class="table-responsive">

<table id="listado" class="table table-border table-striped" style="width:100%">
    <thead>
        <tr>
            <th> # </th>
            <th> Tipo </th>
            <th> Número </th>
            <th> Fecha </th>
            <th> Total </th>
            <th> Estado </th>
            <th> Acciones </th>
        </tr>
    </thead>
    <tbody>
        @if (count($inventariocabs) > 0)
            @foreach ($inventariocabs as $inventario_cab)
                <tr>
                    <td>{{ $inventario_cab->id }}</td>
                    <td>{{ $inventario_cab->tipo->descripcion }}</td>

                    <td>{{ $inventario_cab->numero }}</td>
                    <td>{{ $inventario_cab->fecha }}</td>
                    <td>{{ $inventario_cab->total }}</td>
                    <td>
                        @if ($inventario_cab->estado)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </td>               
                    <td>
                        <a class="btn btn-primary" href="/inventario/{{ $inventario_cab->id }}/editar"><i class="fa-solid fa-pen-to-square"></i></a> 

                        <form action="/inventario/{{ $inventario_cab->id }}/eliminar" method="post">
                        @csrf
                            <button type="submit" class="btn {{ $inventario_cab->estado ? 'btn-danger' : 'btn-success' }}">
                                @if ($inventario_cab->estado)
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
                <td colspan="7">Sin registros...</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
@endsection
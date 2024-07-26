@extends('plantilla.plantilla')

@section('contenido')

<h1> Listado de Unidades </h1>
<div class="row pb-2">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block"  href="/unidad/crear"><i
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
        @if (count($unidades) > 0)
            @foreach ($unidades as $unidad)
                <tr>
                    <td>{{ $unidad->id }}</td>
                    <td>{{ $unidad->descripcion }}</td>
                    <td>
                        @if ($unidad->estado)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </td>               
                    <td>
                        <a class="btn btn-primary" href="/unidad/{{ $unidad->id }}/editar"><i class="fa-solid fa-pen-to-square"></i></a> 

                        <form action="/unidad/{{ $unidad->id }}/eliminar" method="post">
                        @csrf
                            <button type="submit" class="btn {{ $unidad->estado ? 'btn-danger' : 'btn-success' }}">
                                @if ($unidad->estado)
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
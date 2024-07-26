@extends('plantilla.plantilla')

@section('contenido')

<h1> Listado de Tipos de Comprobantes </h1>
<div class="row pb-2">
    <div class="col-md-2">
        <a class="btn btn-primary btn-block"  href="/tipo-comprobante/crear"><i
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
            <th> Tipo </th>
            <th> Estado </th>
            <th> Acciones </th>
        </tr>
    </thead>
    <tbody>
        @if (count($tipo_comprobantes) > 0)
            @foreach ($tipo_comprobantes as $tipo_comprobante)
                <tr>
                    <td>{{ $tipo_comprobante->id }}</td>
                    <td>{{ $tipo_comprobante->descripcion }}</td>
                    <td>
                        @if ($tipo_comprobante->tipo)
                            Ingreso
                        @else
                            Egreso
                        @endif
                    </td>
                    <td>
                        @if ($tipo_comprobante->estado)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </td>               
                    <td>
                        <a class="btn btn-primary" href="/tipo-comprobante/{{ $tipo_comprobante->id }}/editar"><i class="fa-solid fa-pen-to-square"></i></a> 

                        <form action="/tipo-comprobante/{{ $tipo_comprobante->id }}/eliminar" method="post">
                        @csrf
                            <button type="submit" class="btn {{ $tipo_comprobante->estado ? 'btn-danger' : 'btn-success' }}">
                                @if ($tipo_comprobante->estado)
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
@extends('plantilla.plantilla')
@section('contenido')

<hr>
<form method="post" action="/usuario_rol/guardar">
    @csrf
    <div class="form-group">
        <label for="usuario_id">Selecciona un usuario:</label>
        <select class="form-control" id="usuario_id" name="usuario_id">
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="rol_id">Selecciona un rol:</label>
        <select class="form-control" id="rol_id" name="rol_id">
            @foreach($rol as $rol)
                <option value="{{ $rol->id }}">{{ $rol->descripcion }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<table id="listado" class="table table-border table-striped" style="width:100%">
    <!-- ... -->
</table>
@endsection

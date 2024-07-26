@extends('plantilla.plantilla')

@section('contenido')

<h2>Editar Rol de Usuario</h2>

<hr>
<form method="POST" action="/usuario_rol/guardar/{{$usuario_rol->id}}">
@csrf

<div class="form-group">
    <label for="nombres">nombres</label>
    <input type="text" class="form-control" id= "nombres" name="nombres" value="{{$usuario_rol->nombre}}">
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <select name="estado" id="estado" class="form-control">
        <option value="1">activo</option>
        <option value="0">Inactivo</option>
    </select>
</div>

<div class="form-group">
    <input type="date" id="fecha_creado" name="fecha_creado" value="<?php echo date('Y-m-d'); ?>">
</div>

<button type="submit" class="btn btn-primary">Guardar</button>

<a href="/usuarios/" class="btn btn-warning">Cancelar</a>

</form>
@endsection
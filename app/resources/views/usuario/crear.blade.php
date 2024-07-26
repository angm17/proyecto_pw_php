@extends('plantilla.plantilla')
@section('contenido')

<h2>Crear nuevo usuario</h2>

<hr>
<form method="POST" action="/usuarios/guardar">
@csrf

<div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" class="form-control" id= "nombres" name="nombres">
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <select name="estado" id="estado" class="form-control">
        <option value="1">activo</option>
        <option value="0">Inactivo</option>
    </select>
</div>

<div class="form-group">
    <label for="clave">Clave</label>
    <input type="text" class="form-control" id= "clave" name="clave">
</div>


<button type="submit" class="btn btn-primary">Guardar</button>
<a href="/usuarios/" class="btn btn-warning">Cancelar</a>
</form>
@endsection
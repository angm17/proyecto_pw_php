@extends('plantilla.plantilla')
@section('contenido')

<h2>Crear nuevo rol</h2>

<hr>
<form method="POST" action="/rol/guardar">
@csrf

<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" id= "descripcion" name="descripcion">
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <select name="estado" id="estado" class="form-control">
        <option value="1">activo</option>
        <option value="0">Inactivo</option>
    </select>
</div>


<button type="submit" class="btn btn-primary">Guardar</button>
<a href="/rol/" class="btn btn-warning">Cancelar</a>
</form>
@endsection
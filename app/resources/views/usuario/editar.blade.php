@extends('plantilla.plantilla')

@section('contenido')

<h2>Editar usuario</h2>

<hr>
<form method="POST" action="/usuarios/guardar/{{$usuario->id}}">
@csrf

<div class="form-group">
    <label for="nombres">nombres</label>
    <input type="text" class="form-control" id= "nombres" name="nombres" value="{{$usuario->nombre}}">
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <select name="estado" id="estado" class="form-control">
        <option value="1" @if ($usuario->estado == 1) selected @endif> Activo </option>
                            <option value="0" @if ($usuario->estado == 0) selected @endif> Inactivo </option>
    </select>
</div>

<div class="form-group">
    <label for="clave">Clave</label>
    <input type="text" class="form-control" id= "clave" name="clave" value="{{$usuario->clave}}">
</div>

<button type="submit" class="btn btn-primary">Guardar</button>

<a href="/usuarios/" class="btn btn-warning">Cancelar</a>

</form>
@endsection
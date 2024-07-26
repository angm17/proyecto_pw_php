@extends('plantilla.plantilla')

@section('contenido')

<h1> Crear Nueva Categoría de Producto </h1>
<hr>

<div class="row">
    <div class="col-md-4">
        <div class="row">
            <form action="/categoria-producto/guardar" method="post">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input required type="text" class="form-control" id="descripcion" name="descripcion"
                        placeholder="Descripción de la categoría de producto">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="estado"> Estado </label>
                        <select required name="estado" id="estado" class="form-control">
                            <option value="1"> Activo </option>
                            <option value="0"> Inactivo </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary  btn-block"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-warning btn-block" href="/categoria-producto">Cancelar</a>
                </div>
            </div>

            </form>
    </div>
</div>

@endsection
@extends('plantilla.plantilla')

@section('contenido')

<h1> Editar Producto </h1>
<hr>

<div class="row">
    <div class="col-md-4">
        <div class="row">
            <form action="/producto/{{ $producto->id }}/guardarProductoEditado" method="post">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input required type="text" class="form-control" id="descripcion" name="descripcion"
                        placeholder="Descripción del producto" value="{{ $producto->descripcion }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select required id="categoria" name="categoria" class="custom-select">
                            <option value="">SELECCIONAR</option>
                            @foreach ($categoriaProductos as $categoria)
                                <option value="{{ $categoria->id }}" {{ $producto->id_categoria == $categoria->id ? 'selected' : '' }}>{{ $categoria->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="unidad">Unidad</label>
                        <select required id="unidad" name="unidad" class="custom-select">
                            <option value="">SELECCIONAR</option>
                            @foreach ($unidades as $unidad)
                                <option value="{{ $unidad->id }}" {{ $producto->id_unidad == $unidad->id ? 'selected' : '' }}>{{ $unidad->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input required type="number" class="form-control" id="precio" name="precio" step=".0001"
                        placeholder="Precio del producto" value="{{ $producto->precio }}">
                    </div>
                </div>

             
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="estado"> Estado </label>
                        <select required name="estado" id="estado" class="form-control">
                            <option value="1" @if ($producto->estado == 1) selected @endif> Activo </option>
                            <option value="0" @if ($producto->estado == 0) selected @endif> Inactivo </option>
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
                    <a class="btn btn-warning btn-block" href="/producto">Cancelar</a>
                </div>
            </div>

            </form>
    </div>
</div>

@endsection
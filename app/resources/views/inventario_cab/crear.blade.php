@extends('plantilla.plantilla')

@section('contenido')

<h3> Transacción de Inventario @if ($inventario_cab->id)
    : {{$inventario_cab->tipo->descripcion}} - {{$inventario_cab->numero}}
    @endif</h3>
<hr>

<div class="row">
    <div class="col-md-12">
            

            <form id="formCab" onsubmit="submitForm(event)">
                @csrf
                @if ($inventario_cab->id)
                <input type="hidden" name="id_inventario" value="{{ $inventario_cab->id }}">

                @endif
                <div class="row">
    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tipo_comprobante">Tipo de Comprobante</label>
                            <select required id="tipo_comprobante" name="tipo_comprobante" class="custom-select" @if ($inventario_cab->id) disabled @endif>
                                <option value="">SELECCIONAR</option>
                                @foreach ($tipoComprobantes as $tipo_comprobante)
                                <option value="{{ $tipo_comprobante->id }}" {{ $inventario_cab->id_tipo_comprobante == $tipo_comprobante->id ? 'selected' : '' }}>{{ $tipo_comprobante->descripcion }}</option>
                            @endforeach
                              
                            </select>
                        </div>
                    </div>
    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="almacen">Almacén</label>
                            <select required id="almacen" name="almacen" class="custom-select">
                                <option value="">SELECCIONAR</option>
                                @foreach ($almacenes as $almacen)
                                <option value="{{ $almacen->id }}" {{ $inventario_cab->id_almacen == $almacen->id ? 'selected' : '' }}>{{ $almacen->nombre }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input required type="date" class="form-control" id="fecha" name="fecha"
                            placeholder="Fecha del inventario cabecera" value="{{ $inventario_cab->fecha }}">
                        </div>
                    </div>
    
    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado"> Estado </label>
                            <select required name="estado" id="estado" class="form-control">
                                <option value="1" @if ($inventario_cab->estado == 1) selected @endif> Activo </option>
                                <option value="0" @if ($inventario_cab->estado == 0) selected @endif> Inactivo </option>
                            </select>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-2">
                        <button type="submit"  name="action" class="btn btn-primary  btn-block" value="registro" value="guardar"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-warning btn-block" href="/inventario">Cancelar</a>
                    </div>
                </div>
                
                
                
    
    
                </form>
                <hr>

    </div>
    <div class="col-md-12">
        <form id="detallesForm">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="producto">Producto</label>
                        <select required id="producto" name="producto" class="custom-select">
                            <option value="">SELECCIONAR</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input required type="number" class="form-control" id="cantidad" name="cantidad"
                            placeholder="cantidad">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input required type="number" class="form-control" id="costo" name="costo"
                            placeholder="costo">
                    </div>
                </div>

                
            </div>

            <div class="row">
                <div class="col-md-2">
                    <button type="submit"  name="action" class="btn btn-success  btn-block btn-sm" value="registro"><i class="fa-regular fa-plus"></i> Añadir Detalle</button>
                </div>
            </div>
        </form>

    </div>

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="detalleTable">
                @foreach ($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->id_producto }}</td>
                    <td>{{ $detalle->producto->descripcion }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->costo }}</td>
                    <td>{{ $detalle->total }}</td>
                   
                    <td>
                        <button type="submit" class="btn btn-danger" onclick="eliminarFila(this)">
                           X
                        </button>
                        
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function eliminarFila(btn) {
        var row = btn.closest('tr');
        row.parentNode.removeChild(row);
    }
</script>


<script>
    const detalleTable = document.querySelector("#detalleTable");

    function agregarDetalle(producto, nombreProducto, cantidad, costo, callback){
        const trMov =  document.createElement("tr");
        const tdproducto = document.createElement("td");
        tdproducto.innerHTML = producto;

        const tdnombreProducto = document.createElement("td");
        tdnombreProducto.innerHTML = nombreProducto;

        const tdcantidad = document.createElement("td");
        tdcantidad.innerHTML = cantidad;

        const tdcosto = document.createElement("td");
        tdcosto.innerHTML = costo;
        const tdTotal = document.createElement("td");
        tdTotal.innerHTML = cantidad * costo;

        const tdBoton = document.createElement("td");
        const boton = document.createElement("boton");
        boton.classList.add("btn", "btn-danger");
        boton.innerHTML = "X";
        tdBoton.appendChild(boton);
        
        tdBoton.addEventListener("click", (e) => {
            e.preventDefault();
            trMov.remove();
        })
    
        trMov.appendChild(tdproducto);
        trMov.appendChild(tdnombreProducto);
        trMov.appendChild(tdcantidad);
        trMov.appendChild(tdcosto);
        trMov.appendChild(tdTotal);
        trMov.appendChild(tdBoton);

        detalleTable.appendChild(trMov);

        callback();
    }

    const detallesForm = document.querySelector("#detallesForm");
    
    detallesForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const producto = document.querySelector("#producto");
        const cantidad = document.querySelector("#cantidad");
        const costo = document.querySelector("#costo");
        agregarDetalle(producto.value, producto.options[producto.selectedIndex].text, cantidad.value, costo.value, () => {
            detallesForm.reset();
        });
    });
</script>




<script>
    function submitForm(event) {
        event.preventDefault();
        
        // Capturamos los datos del formulario
        const form = document.getElementById('formCab');
        const formData = new FormData(form);

        const data = {
            id_inventario: formData.get('id_inventario'),
            tipo_comprobante: formData.get('tipo_comprobante'),
            almacen: formData.get('almacen'),
            fecha: formData.get('fecha'),
            estado: formData.get('estado'),
            detalles: []
        };

        // Capturamos los datos de la tabla
        const rows = document.querySelectorAll('#detalleTable tr');
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const detalle = {
                codigo: cells[0].innerText,
                descripcion: cells[1].innerText,
                cantidad: cells[2].innerText,
                costo: cells[3].innerText,
                total: cells[4].innerText
            };
            data.detalles.push(detalle);
        });

        // Enviamos los datos usando Axios
        axios.post('/inventario/guardar', data)
            .then(response => {
                console.log(response.data);
                alert('Datos guardados exitosamente');
                window.location.href = '/inventario';

            })
            .catch(error => {
                console.error(error);
                alert('Error al guardar los datos');
            });
    }
</script>

@endsection
<?php

namespace App\Http\Controllers;
use App\Models\InventarioCab;
use App\Models\Almacen;
use App\Models\TipoComprobante;
use App\Models\Producto;
use App\Models\InventarioDet;


use Illuminate\Http\Request;

class InventarioController extends Controller
{
    function index(){
        $inventariocabs = InventarioCab::with('tipo')->get();
        return view("inventario_cab.index", ["inventariocabs" => $inventariocabs, 'title' => 'Movimientos de inventario']);
    }

    function nuevoInventarioCab(){
        $almacenes = Almacen::all();
        $tipoComprobantes = TipoComprobante::all();
        $productos = Producto::all();
        $detalles = [];
        $inventario_cab = new InventarioCab(); 
        return view("inventario_cab.crear", ["almacenes" => $almacenes, "detalles" => $detalles, "tipoComprobantes" => $tipoComprobantes, "inventario_cab" => $inventario_cab, 'title' => 'Agregar Inventario Cabecera', 'productos' => $productos]);
    }



    function guardarInventarioCab(Request $request){

        // Validar los datos recibidos
        $request->validate([
            'almacen' => 'required',
            'fecha' => 'required|date',
            'estado' => 'required|boolean',
            'detalles' => 'required|array',
            'detalles.*.codigo' => 'required',
            'detalles.*.cantidad' => 'required|numeric',
            'detalles.*.costo' => 'required|numeric',
            'detalles.*.total' => 'required|numeric',
        ]);
        
        $id_inventario = $request->input("id_inventario");

        $almacen = $request->input("almacen");
       
        $fecha = $request->input("fecha");
        $subtotal = 0;
        $total = 0;
        $estado = $request->input("estado");


        foreach ($request->detalles as $detalle) {
            $subtotalDetalle = $detalle['cantidad'] * $detalle['costo'];
            $totalDetalle = $detalle['total'];  // Suponiendo que este ya está calculado correctamente en el front-end
    
            $subtotal += $subtotalDetalle;
            $total += $totalDetalle;
        }

        
        $inventario = new InventarioCab;
        if ($id_inventario) {
            $inventario = InventarioCab::find($id_inventario);
            if ($inventario) {
                InventarioDet::where('id_inventario', $id_inventario)->delete();
            } else {
                return response()->json(['error' => 'Inventario no encontrado'], 404);
            }
        }else{
            $inventario = new InventarioCab;
            $tipo_comprobante = $request->input("tipo_comprobante");

            $maxNumero = InventarioCab::where('id_tipo_comprobante', $tipo_comprobante)->max('numero');
            $numero = $maxNumero ? $maxNumero + 1 : 1;
            $inventario->numero = $numero;
            $inventario->id_tipo_comprobante = $tipo_comprobante;
   
        }
        $inventario->id_almacen = $almacen;
        
        $inventario->fecha = $fecha;
        $inventario->subtotal =$subtotal;
        $inventario->impuesto = 0;
        $inventario->total = $total;
        $inventario->estado = $estado;
        $inventario->fecha_creado = NOW();
        $inventario->creado_por = 1;

        $inventario->save();


        // Guardar los detalles del inventario
        foreach ($request->detalles as $detalle) {
            $detalleInventario = new InventarioDet();
            $detalleInventario->id_inventario = $inventario->id;
            $detalleInventario->id_producto = $detalle['codigo'];
            $detalleInventario->cantidad = $detalle['cantidad'];
            $detalleInventario->subtotal = 0;
            $detalleInventario->costo = $detalle['costo'];
            $detalleInventario->total = $detalle['total'];
            $detalleInventario->unidad = 1;

            $detalleInventario->save();
        }
        return response()->json(['message' => 'Inventario guardado exitosamente']);
    }

    function editarInventarioCab($id){
        $inventario_cab = InventarioCab::with('tipo')->find($id);
        $detalles = InventarioDet::with('producto')->where( "id_inventario", $id)->get();
        $almacenes = Almacen::all();
        $tipoComprobantes = TipoComprobante::all();
        $productos = Producto::all();

        return view("inventario_cab.crear", ["inventario_cab" => $inventario_cab, "detalles" =>  $detalles, "productos" => $productos, "almacenes" => $almacenes, "tipoComprobantes" => $tipoComprobantes, 'title' => 'Editar Inventario Cabecera']);
    }


    public function eliminarInventarioCab($id){
        $inventario_cab = InventarioCab::find($id);
        $inventario_cab->estado = !$inventario_cab->estado;
        $inventario_cab->save();
        return redirect('/inventario');
    }


    public function listadoInventario(){

        $productos = Producto::all();
        return view("inventario_cab.stock", ["productos" => $productos]);
        // $inventario_cab = InventarioCab::find($id);
        // $inventario_cab->estado = !$inventario_cab->estado;
        // $inventario_cab->save();
        // return redirect('/inventario');
    }




}

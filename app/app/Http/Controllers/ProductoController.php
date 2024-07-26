<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\Unidad;

class ProductoController extends Controller
{
    function index(){
        $productos = Producto::with("categoria")->get();
        $categoriaProductos = CategoriaProducto::all();
        $unidades = Unidad::all();
        return view("producto.index", ["productos" => $productos, "categoriaProductos" => $categoriaProductos, "unidades" => $unidades, 'title' => 'Productos']);
    }

    function nuevoProducto(){
        $categoriaProductos = CategoriaProducto::all();
        $unidades = Unidad::all();
        $producto = new Producto(); 
        return view("producto.crear", ["categoriaProductos" => $categoriaProductos, "unidades" => $unidades, "producto" => $producto, 'title' => 'Agregar Producto']);
    }

    function guardarProducto(Request $request){
        $descripcion = $request->input("descripcion");
        $categoria = $request->input("categoria");
        $unidad = $request->input("unidad");
        // $es_kit = $request->input("es_kit");
        $precio = $request->input("precio");
        // $impuesto = $request->input("impuesto");
        $estado = $request->input("estado");

        $producto = new Producto;
        $producto -> descripcion = $descripcion;
        $producto -> id_categoria = $categoria;
        $producto -> id_unidad = $unidad;
        $producto -> es_kit = 0;//$es_kit;
        $producto -> precio = $precio;
        $producto -> impuesto = 0;
        $producto -> estado = $estado;
        $producto -> fecha_creado = NOW();
        $producto -> creado_por = 1;

        $producto -> save();

        return redirect("/producto");
    }

    function editarProducto($id){
        $producto = Producto::find($id);
        $categoriaProductos = CategoriaProducto::all();
        $unidades = Unidad::all();
        return view("producto.editar", ["producto" => $producto, "categoriaProductos" => $categoriaProductos, "unidades" => $unidades, 'title' => 'Editar Producto']);
    }

    function guardarProductoEditado($id, Request $request){
        $producto = Producto::find($id);
        $producto -> descripcion = $request->input("descripcion");
        $producto -> id_categoria = $request->input("categoria");
        $producto -> id_unidad = $request->input("unidad");
        $producto -> es_kit = 0;//$request->input("es_kit");
        $producto -> precio = $request->input("precio");
        $producto -> impuesto = 0;
        $producto -> estado = $request->input("estado");
        $producto -> fecha_modificado = NOW();
        $producto -> modificado_por = 1;

        $producto -> save();
    
        return redirect("/producto");
    }

    public function eliminarProducto($id){
        $producto = Producto::find($id);
        $producto->estado = !$producto->estado;
        $producto->save();
        return redirect('/producto');
    }
}


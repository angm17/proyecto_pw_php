<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

class CategoriaProductoController extends Controller
{
    function index(){
        $categoriaproductos = CategoriaProducto::all();
        return view("categoria_producto.index", ["categoriaproductos" => $categoriaproductos, 'title' => 'Categorías de Productos']);
    }

    function nuevaCategoriaProducto(){
        return view("categoria_producto.crear", ['title' => 'Agregar Categoría de Producto']);
    }

    function guardarCategoriaProducto(Request $request){
        $descripcion = $request->input("descripcion");
        $estado = $request->input("estado");

        $categoria_producto = new CategoriaProducto;
        $categoria_producto -> descripcion = $descripcion;
        $categoria_producto -> estado = $estado;
        $categoria_producto -> fecha_creado = NOW();
        $categoria_producto -> creado_por = 1;

        $categoria_producto -> save();

        return redirect("/categoria-producto");
    }

    function editarCategoriaProducto($id){
        $categoria_producto = CategoriaProducto::find($id);
        return view("categoria_producto.editar", ["categoria_producto" => $categoria_producto, 'title' => 'Editar Categoria de Producto']);
    }

    function guardarCategoriaProductoEditada($id, Request $request){
        $categoria_producto = CategoriaProducto::find($id);
        $categoria_producto -> descripcion = $request->input("descripcion");
        $categoria_producto -> estado = $request->input("estado");
        $categoria_producto -> fecha_modificado = NOW();
        $categoria_producto -> modificado_por = 1;

        $categoria_producto -> save();
    
        return redirect("/categoria-producto");
    }

    public function eliminarCategoriaProducto($id){
        $categoria_producto = CategoriaProducto::find($id);
        $categoria_producto->estado = !$categoria_producto->estado;
        $categoria_producto->save();
        return redirect('/categoria-producto');
    }
}


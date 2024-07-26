<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Usuario_rolController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\TipoComprobanteController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\InventarioCabController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\InventarioDetController;


use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name("inicio");


Route::get("/usuarios", [UsuarioController::class, 'index'])->name("usuarios");
Route::get("/usuarios/nuevo", [UsuarioController::class, 'nuevoUsuario']);
Route::post("/usuarios/guardar", [UsuarioController::class, 'guardarUsuario']);
Route::post("/usuarios/guardar/{id}", [UsuarioController::class, 'editarUsuario']);


////////////////
Route::post("/usuarios/{id}/eliminar", [UsuarioController::class, 'eliminarUsuario']);
////////////////



Route::get("/usuarios/{id}", [UsuarioController::class, 'verEditar']);



//sancan
Route::get("/usuario_rol", [Usuario_rolController::class, 'index'])->name("usuario_rol");
Route::get("/usuario_rol/nuevo", [Usuario_rolController::class, 'nuevousuario_rol']);
Route::post("/usuario_rol/guardar",[Usuario_rolController::class, 'guardarusuario_rol']);
Route::post("/usuario_rol/guardar/{id}",[Usuario_rolController::class, 'editarusuario_rol']);
Route::get("/usuario_rol/{id}", [Usuario_rolController::class, 'verEditar']);
Route::post("/usuario_rol/{id}/eliminar", [Usuario_rolController::class, 'eliminarusuario_rol']);

Route::get("/almacen", [AlmacenController::class, 'index'])->name("almacen");
Route::get("/almacen/nuevo", [AlmacenController::class, 'nuevoalmacen']);
Route::post("/almacen/guardar",[AlmacenController::class, 'guardaralmacen']);
Route::post("/almacen/guardar/{id}",[AlmacenController::class, 'editaralmacen']);
Route::get("/almacen/{id}", [AlmacenController::class, 'verEditar']);
Route::post("/almacen/{id}/eliminar", [AlmacenController::class, 'eliminaralmacen']);



Route::get("/rol", [rolController::class, 'index'])->name("rol");
Route::get("/rol/nuevo", [rolController::class, 'nuevorol']);
Route::post("/rol/guardar",[rolController::class, 'guardarrol']);
Route::post("/rol/guardar/{id}",[rolController::class, 'editarrol']);
Route::get("/rol/{id}", [rolController::class, 'verEditar']);
Route::post("/rol/{id}/eliminar", [rolController::class, 'eliminarrol']);



//bryan

Route::get("/unidad", [UnidadController::class, 'index'])->name("unidad");
Route::get("/unidad/crear", [UnidadController::class, 'nuevaUnidad']);
Route::post("/unidad/guardar", [UnidadController::class, 'guardarUnidad']);
Route::get("/unidad/{id}/editar", [UnidadController::class, 'editarUnidad']);
Route::post("/unidad/{id}/guardarUnidadEditada", [UnidadController::class, 'guardarUnidadEditada']);
Route::post("/unidad/{id}/eliminar", [UnidadController::class, 'eliminarUnidad']);

Route::get("/tipo-comprobante", [TipoComprobanteController::class, 'index'])->name("tipo-comprobante");
Route::get("/tipo-comprobante/crear", [TipoComprobanteController::class, 'nuevoTipoComprobante']);
Route::post("/tipo-comprobante/guardar", [TipoComprobanteController::class, 'guardarTipoComprobante']);
Route::get("/tipo-comprobante/{id}/editar", [TipoComprobanteController::class, 'editarTipoComprobante']);
Route::post("/tipo-comprobante/{id}/guardarTipoComprobanteEditado", [TipoComprobanteController::class, 'guardarTipoComprobanteEditado']);
Route::post("/tipo-comprobante/{id}/eliminar", [TipoComprobanteController::class, 'eliminarTipoComprobante']);

Route::get("/categoria-producto", [CategoriaProductoController::class, 'index'])->name("categoria");
Route::get("/categoria-producto/crear", [CategoriaProductoController::class, 'nuevaCategoriaProducto']);
Route::post("/categoria-producto/guardar", [CategoriaProductoController::class, 'guardarCategoriaProducto']);
Route::get("/categoria-producto/{id}/editar", [CategoriaProductoController::class, 'editarCategoriaProducto']);
Route::post("/categoria-producto/{id}/guardarCategoriaProductoEditada", [CategoriaProductoController::class, 'guardarCategoriaProductoEditada']);
Route::post("/categoria-producto/{id}/eliminar", [CategoriaProductoController::class, 'eliminarCategoriaProducto']);

Route::get("/inventario", [InventarioController::class, 'index'])->name("inventario");
Route::get("/inventario/crear", [InventarioController::class, 'nuevoInventarioCab']);
Route::post("/inventario/guardar", [InventarioController::class, 'guardarInventarioCab']);
Route::get("/inventario/{id}/editar", [InventarioController::class, 'editarInventarioCab']);
Route::post("/inventario/{id}/guardarInventarioCabEditada", [InventarioController::class, 'guardarInventarioCabEditada']);
Route::post("/inventario/{id}/eliminar", [InventarioController::class, 'eliminarInventarioCab']);


Route::get("/inventario/stock", [InventarioController::class, 'listadoInventario'])->name("stock");



Route::get("/producto", [ProductoController::class, 'index'])->name("producto");
Route::get("/producto/crear", [ProductoController::class, 'nuevoProducto']);
Route::post("/producto/guardar", [ProductoController::class, 'guardarProducto']);
Route::get("/producto/{id}/editar", [ProductoController::class, 'editarProducto']);
Route::post("/producto/{id}/guardarProductoEditado", [ProductoController::class, 'guardarProductoEditado']);
Route::post("/producto/{id}/eliminar", [ProductoController::class, 'eliminarProducto']);

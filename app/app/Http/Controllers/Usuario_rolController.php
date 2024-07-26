<?php

namespace App\Http\Controllers;
use App\Models\Usuario_rol;
use Illuminate\Http\Request;

class Usuario_rolController extends Controller
{
    function index(){
        $usuarios_rol = Usuario_rol::all();
        return view("usuario_rol.listar", ["usuario_rol" => $usuarios_rol]);
    }

    function nuevoUsuario_rol(){
        return view("usuario_rol.crear");
    }

    function guardarUsuario_rol(Request $request){
        
        $request->validate(['rol_id' => 'required',]);
        
        $usuarioRol = new Usuario_rol();
        $usuarioRol->rol_id = $request->input('rol_id');
        $usuarioRol->usuario_id = $request->input('usuario_id');
        
        $usuarioRol->save();
        return redirect("/usuario_rol");
        $usuarios = Usuario::all();
        return view('usuario_rol.crear', compact('usuarios'));
    }
    

    function verEditar($id){
        $usuario_rol = Usuario_rol::find($id);
        return view("usuario_rol.editar", ["usuario_rol" => $usuario_rol]);
    }

    function editarUsuario_rol(Request $request, $id){
        $id_usuario = $request->input("id_usuario");
        $id_rol = $request->input("id_rol");

        $usuario_rol = Usuario_rol::find($id);
        
        $usuario_rol->usuario->nombre = $id_usuario;
        $usuario_rol->rol->descripcion = $id_rol;
        $usuario_rol->save();
        return redirect("/usuarios");
    }

    function eliminarUsuario_rol(Request $request, $id){
        $usuario_rol = Usuario_rol::find($id);
        $usuario_rol->estado = $estado = !$usuario_rol->estado;
        $usuario_rol->save();
        return redirect("/usuarios_rol");
    }
}

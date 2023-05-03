<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function indexc(){
        $categoria=categoria::all();
        return $categoria;
    }
    public function createc(Request $request)
    {
        $request->validate([
            'nombre'=>'required | unique:categorias',
            'descripcion'=>'required',
            'tipo'=>'required',
        ]);

        $categoria = new categoria();
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->tipo=$request->tipo;
        $categoria->save();
        return response()->json([
            'message' => 'Successfully created category!'
        ]);

    }
        public function updatenombre(Request $request, $id){
        $user_id = $id;
        if (categoria::where(["id" => $user_id])->exists()) {
            $categoria = categoria::find($user_id);
            $categoria->nombre = $request->nombre;
            $categoria->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }
    public function updatedescripcion(Request $request, $id){
        $user_id = $id;
        if (categoria::where(["id" => $user_id])->exists()) {
            $updateuser = categoria::find($user_id);
            $updateuser->descripcion = $request->descripcion;
            $updateuser->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }
    public function updatetipo(Request $request, $id){
    public function deletec(Request $request)
    {
        categoria::destroy($request->id);
    }
}

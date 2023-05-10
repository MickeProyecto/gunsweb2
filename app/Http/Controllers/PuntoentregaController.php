<?php

namespace App\Http\Controllers;

use App\Models\puntoentrega;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuntoentregaController extends Controller
{
    public function indexpu()
    {
        $puntoentrega = puntoentrega::all();
        return $puntoentrega;
    }

    public function indexpuex($id)
    {
        $sql = "select id, tienda, provincia, cp, direccion, mapa, streeview, encargado, foto
        from puntoentregas
        where id = $id;";
        $puntoentregas = DB::select($sql);
        return $puntoentregas;
    }

    public function createpu(Request $request)
    {
        $request->validate([
            'tienda' => 'required',
            'provincia' => 'required',
            'cp' => 'required',
            'direccion' => 'required',
            'mapa' => 'required',
            'streeview' => 'required',
            'encargado' => 'required',
            'foto' => 'required',
        ]);

        $puntoentrega = new puntoentrega();
        $puntoentrega->tienda = $request->tienda;
        $puntoentrega->provincia = $request->provincia;
        $puntoentrega->cp = $request->cp;
        $puntoentrega->direccion = $request->direccion;
        $puntoentrega->mapa = $request->mapa;
        $puntoentrega->streeview = $request->streeview;
        $puntoentrega->encargado = $request->encargado;
        $puntoentrega->foto = $request->foto;
        $puntoentrega->save();
        return Response()->json([
            'message' => 'Successfull crerated puntoentrega'
        ]);
    }

    public function readpu(Request $request)
    {
    }

    public function updatefoto(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->foto = $request->foto;
            $updatepuntoentrega->save();
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

    public function updatetienda(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->tienda = $request->tienda;
            $updatepuntoentrega->save();
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

    public function updateprovincia(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->provincia = $request->provincia;
            $updatepuntoentrega->save();
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

    public function updatecp(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->cp = $request->cp;
            $updatepuntoentrega->save();
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

    public function updatedireccion(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->direccion = $request->direccion;
            $updatepuntoentrega->save();
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

    public function updatemapa(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->mapa = $request->mapa;
            $updatepuntoentrega->save();
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

    public function updatestreeview(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->streeview = $request->streeview;
            $updatepuntoentrega->save();
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

    public function updateencargado(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $puntoentega_id = $id;
        if (puntoentrega::where(["id" => $puntoentega_id])->exists()) {
            $updatepuntoentrega = puntoentrega::find($puntoentega_id);
            $updatepuntoentrega->encargado = $request->encargado;
            $updatepuntoentrega->save();
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

    public function deletepu(Request $request, $id)
    {
        puntoentrega::destroy($id);
    }
}

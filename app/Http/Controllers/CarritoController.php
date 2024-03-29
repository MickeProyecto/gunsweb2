<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function indexca()
    {
        $carrito = carrito::all();
        return $carrito;
    }

    public function namematerial($id)
    {
        $sql = "select img, nombre from materials where id = $id;";
        $name = DB::select($sql);
        return $name;
    }

    public function createca(Request $request)
    {
        $carrito = new carrito();
        $carrito->id_user = $request->id_user;
        $carrito->id_material = $request->id_material;
        $carrito->precio = $request->precio;
        $carrito->cantidad = $request->cantidad;
        $carrito->save();
        return response()->json([
            'message' => 'Successfully created category!'
        ]);
    }
    public function readca(Request $request)
    {
    }
    public function updateca(Request $request)
    {
        $carrito = carrito::findOrFail($request->id);
        $carrito->id_material = $request->id_material;
        $carrito->descripcion = $request->descripcion;
        $carrito->tipo = $request->tipo;
        $carrito->save();
        return $carrito;
    }
    public function deleteca($id)
    {
        carrito::destroy($id);
    }
}

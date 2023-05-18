<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = pedidos::all();
        return $pedidos;
    }

    public function indexo($id)
    {
        $sql = "Select metodo_pago, id_punto_entrega, id_material, id_usuario, Total, estado
                from pedidos
                where id_usuario = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function indexnombreproducto($id)
    {
        $sql = "Select nombre
                from materials
                where id = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function indexnombretienda($id)
    {
        $sql = "Select tienda
                from puntoentregas
                where id = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function indexnombrecleinte($id)
    {
        $sql = "Select name, lastname
                from users
                where id = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function createpe(Request $request)
    {
        $request->validate([
            'metodo_pago',
            'id_punto_entrega',
            'id_material',
            'id_usuario',
            'total',
            'estado'
        ]);
        $pedidos = new pedidos();
        $pedidos->metodo_pago = $request->metodo_pago;
        $pedidos->id_punto_entrega = $request->id_punto_entrega;
        $pedidos->id_material = $request->id_material;
        $pedidos->id_usuario = $request->id_usuario;
        $pedidos->total = $request->total;
        $pedidos->estado = $request->estado;
        $pedidos->save();
        return Response()->json([
            'message' => 'Successfull crerated pedido'
        ]);
    }
    public function readpe(Request $request)
    {
    }
    public function updatepe(Request $request)
    {
        $pedidos = pedidos::findOrFail($request->id);
        $pedidos->metodo_paga = $request->metodo_paga;
        $pedidos->id_punto_entrega = $request->id_punto_entrega;
        $pedidos->id_material = $request->id_material;
        $pedidos->id_usuario = $request->id_usuario;
        $pedidos->total = $request->total;
        $pedidos->estado = $request->estado;
        $pedidos->save();
        return $pedidos;
    }

    public function deletepe(Request $request)
    {
        pedidos::destroy($request->id);
    }

    public function updatestock($id_material, Request $request)
    {
        $sql = "UPDATE `materials`
                SET `cantidad` = '$request->stock'
                WHERE `materials`.`id` = $id_material;";
        $consulta = DB::select($sql);
        return Response()->json([
            'message' => $consulta
        ]);
    }

    public function updateestado(Request $request)
    {
        $sql = "UPDATE `pedidos`
                SET `estado` = '$request->estado'
                WHERE `id` = $request->id;";
        $consulta = DB::select($sql);
        return Response()->json([
            'message' => $consulta
        ]);
    }
}

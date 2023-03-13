<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'metodo_paga',
        'id_punto_entrega',
        'id_material',
        'id_usuario',
        'total',
        'estado'
    ];
}

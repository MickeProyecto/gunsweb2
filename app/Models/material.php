<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'id',
        'img',
        'nombre',
        'marca',
        'descripcion',
        'cantidad',
        'precio',
        'id_categoria'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puntoentrega extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tienda',
        'provincia',
        'cp',
        'direccion',
        'mapa',
        'streeview',
        'encargado',
        'foto',
    ];
}

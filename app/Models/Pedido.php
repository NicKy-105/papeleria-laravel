<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    protected $table = 'pedidos';
    use SoftDeletes;

    protected $fillable = [
        'producto',
        'nomCliente',
        'telefono',
        'fechaPedido',
        'estado',

    ];
}

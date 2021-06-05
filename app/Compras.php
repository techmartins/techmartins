<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $fillable = [
            'id',
            'id_empresa',
            'empresa',
            'cliente',
            'valor',
            'data_compra',
            'created_at',
            'updated_at',
    ];
}
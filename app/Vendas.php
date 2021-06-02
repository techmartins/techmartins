<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $fillable = [
            'id',
            'valor',
            'cliente',
            'contato',
            'indicador',
            'indicado',
            'id_indicado',
            'pontuacao_indicador',
            'descricao_servico',
            'caed',
            'created_at',
            'updated_at',
    ];
}
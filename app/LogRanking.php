<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogRanking extends Model
{
    protected $fillable = [
        'id', 
        'beneficiario',
        'pontuacao',
        'acao',
        'created_at'
    ];
}
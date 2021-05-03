<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'porcentagem',
        'validade',
        'duracaoMes',
        'observacoes'
      ];
}
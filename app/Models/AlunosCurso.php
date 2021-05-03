<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunosCurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'idAluno',
        'idCurso',
        'turno',
        'idBolsa',
        'dataInicio',
        'dataTermino'
      ];
}
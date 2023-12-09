<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    protected $table = 'agendamentos';
    protected $fillable = [
        'Codigo',
        'data_hora_agendamento',
        'paciente_id',
        'medico_id',
        'tipo_consulta',
        'retorno',
    ];
    protected $dates = ['data_hora_agendamento'];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;
    protected $table = 'prontuarios';
    protected $fillable = [
        'Codigo',
        'DataCadastro',
        'CodPaciente',
        'Nome',
        'CPF',
        'Telefone',
        'paciente_id'
    ];
    protected $dates = ['Datacadastro'];
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'id');
    }
}

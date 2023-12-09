<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    protected $fillable = [
        'NomeCompleto',
        'DataNascimento',
        'RG',
        'CPF',
        'Endereco',
        'Telefone',
        'Email',
        'Datacadastro',
        'Historico',
        'Informacoes',
        'paciente_id'
    ];
    protected $dates = ['DataNascimento', 'Datacadastro'];
    public function prontuarios()
    {
        return $this->hasOne(Prontuario::class, 'paciente_id', 'id');
    }
    
}

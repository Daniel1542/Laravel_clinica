<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;
    protected $table = 'paciente';
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
    ];
    protected $dates = ['DataNascimento', 'Datacadastro'];
    
}

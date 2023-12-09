<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = 'medicos';
    protected $fillable = [
        'NomeCompleto',
        'DataNascimento',
        'RG',
        'CPF',
        'Endereco',
        'Telefone',
        'Email',
        'Datacadastro',
        'Especialidade',
        'medico_id'
    ];
    protected $dates = ['DataNascimento', 'Datacadastro'];

    
   
}


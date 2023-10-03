<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medico extends Model
{
    use HasFactory;
    protected $table = 'medico';
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
    ];
    protected $dates = ['DataNascimento', 'Datacadastro'];
   
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionarios';
    protected $fillable = [
        'NomeCompleto',
        'DataNascimento',
        'RG',
        'CPF',
        'Endereco',
        'Telefone',
        'Email',
        'DataAdmisssao',
        'DataDemissao',
        'Cargo',
    ];
    protected $dates = ['DataNascimento', 'Datacadastro','DataAdmisssao','DataDemissao'];
}

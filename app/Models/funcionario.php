<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionario';
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

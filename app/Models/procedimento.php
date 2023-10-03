<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procedimento extends Model
{
    use HasFactory;
    protected $table = 'procedimento';
    protected $fillable = [
        'Codigo',
        'Descricao',
        'Valor',
        'Observacoes',
    ];
}

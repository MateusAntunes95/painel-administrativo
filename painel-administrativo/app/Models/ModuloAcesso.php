<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuloAcesso extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'tipo_acesso_id',
        'modulo_acesso',
    ];

    protected $casts = [
        'adicionar' => 'boolean',
        'editar' => 'boolean',
        'excluir' => 'boolean',
        'visualizar' => 'boolean',
    ];
}

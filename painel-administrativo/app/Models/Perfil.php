<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'tipo',
        'nome_usuario',
        'url',
        'ultimo_acesso',
    ];
}

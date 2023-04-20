<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'cep',
        'estado',
        'cidade',
        'rua',
        'numero',
        'complemento',
    ];

}

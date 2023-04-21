<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Endereco extends Model implements Auditable 
{
    use HasFactory;
    public $timestamps = false;
    use \OwenIt\Auditing\Auditable;

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

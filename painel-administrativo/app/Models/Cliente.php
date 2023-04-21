<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "clientes";

    protected $fillable = [
        'nome_usuario',
        'nome_completo',
        'cpf',
        'rg',
        'nascimento',
        'email',
        'celular',
        'situacao',
    ];

    public function endereco()
    {
        return $this->hasMany(Endereco::class, 'cliente_id');
    }

    public function perfis()
    {
        return $this->hasMany(Perfil::class);
    }
}

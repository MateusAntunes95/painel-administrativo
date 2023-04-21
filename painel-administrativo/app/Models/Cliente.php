<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cliente extends Model implements Auditable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "clientes";
    use \OwenIt\Auditing\Auditable;

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TipoAcesso extends Model implements Auditable 
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    public $timestamps = false;

    protected $fillable = [
        'titulo',
    ];

    public function modulos()
    {
        return $this->hasMany(ModuloAcesso::class);
    }
}

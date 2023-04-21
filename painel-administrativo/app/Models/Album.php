<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Album extends Model implements Auditable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "albuns";
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'cliente_id',
        'perfil_id',
        'tipo_album',
        'titulo',
        'descricao',
        'caminho_imagem_principal',
        'caminho_video',
        'data_inclusao',
        'situacao',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "albuns";

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

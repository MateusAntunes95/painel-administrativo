<?php

namespace App\Repositories\TipoAcesso;

use App\Models\TipoAcesso;
use App\Models\User;


class ListarRepository
{
    private $dados;
    private $query;

    public function listar(array $dados)
    {
        $this->dados = $dados;
        $this->query = TipoAcesso::query();
        $this->select();
        $this->filter();

        return $this->query;
    }

    private function select()
    {
        $this->query->select([
            'id',
            'titulo',
        ]);
    }

    private function filter()
    {
        if (!empty($this->dados['titulo'])) {
            $this->query->where('titulo', 'LIKE', '%' . $this->dados['titulo'] . '%');
        }

        if (!empty($this->dados['id'])) {
            $this->query->where('id', $this->dados['id']);
        }
    }
}

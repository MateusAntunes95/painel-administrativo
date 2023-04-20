<?php

namespace App\Repositories\User;

use App\Models\User;


class ListarRepository
{
    private $dados;
    private $query;

    public function listar(array $dados)
    {
        $this->dados = $dados;
        $this->query = User::query();
        $this->select();
        $this->filter();

        return $this->query;
    }

    private function select()
    {
        $this->query->select([
            'id',
            'nome',
            'email',
            'celular',
            'situacao',
        ]);
    }

    private function filter()
    {
        if (!empty($this->dados['nome'])) {
            $this->query->where('name', 'LIKE', '%' . $this->dados['nome'] . '%');
        }
        
        if (!empty($this->dados['id'])) {
            $this->query->where('id', $this->dados['id']);
        }
    }
}

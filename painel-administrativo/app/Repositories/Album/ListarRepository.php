<?php

namespace App\Repositories\Album;

use App\Models\Album;

class ListarRepository
{
    private $dados;
    private $query;

    public function listar(array $dados)
    {
        $this->dados = $dados;
        $this->query = Album::query();
        $this->select();
        $this->join();
        $this->filter();

        return $this->query;
    }

    private function select()
    {
        $this->query->select([
            'albuns.id',
            'clientes.nome_usuario',
            'titulo',
            'albuns.situacao',
        ]);
    }

    private function join(): void
    {
        $this->query->join('clientes', 'clientes.id', 'albuns.cliente_id');
    }

    private function filter()
    {
        if (!empty($this->dados['nome'])) {
            $this->query->where('clientes.nome_usuario', 'LIKE', '%' . $this->dados['nome'] . '%');
        }
        
        if (!empty($this->dados['id'])) {
            $this->query->where('albuns.id', $this->dados['id']);
        }

        if (!empty($this->dados['situacao'])) {
            $this->query->where('albuns.situacao', $this->dados['situacao']);
        }
    }
}

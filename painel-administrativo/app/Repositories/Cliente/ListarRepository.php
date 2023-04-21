<?php

namespace App\Repositories\Cliente;

use App\Models\Cliente;

class ListarRepository
{
    private $dados;
    private $query;

    public function listar(array $dados)
    {
        $this->dados = $dados;
        $this->query = Cliente::query();
        $this->select();
        $this->filter();

        return $this->query;
    }

    private function select()
    {
        $this->query->select([
            'clientes.id',
            'clientes.nome_usuario',
            'clientes.email',
            'clientes.celular',
            'clientes.situacao',
        ]);
    }

    private function filter()
    {
        if (!empty($this->dados['nome_usuario'])) {
            $this->query->where('nome_usuario', 'LIKE', '%' . $this->dados['nome_usuario'] . '%');
        }
        
        if (!empty($this->dados['id'])) {
            $this->query->where('clientes.id', $this->dados['id']);
        }

        if (!empty($this->dados['situacao'])) {
            $this->query->where('situacao', $this->dados['situacao']);
        }
    }
}

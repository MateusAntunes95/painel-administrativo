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
        // $this->join();
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

    private function join(): void
    {
        $this->query->leftjoin('perfils', 'clientes.id', 'perfils.cliente_id');
        $this->query->leftjoin('enderecos', 'clientes.id', 'enderecos.cliente_id');
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

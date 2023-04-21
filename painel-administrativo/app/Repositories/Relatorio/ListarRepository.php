<?php

namespace App\Repositories\Relatorio;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ListarRepository
{
    private $dados;
    private $query;

    public function listar(array $dados)
    {
        $this->dados = $dados;
        $this->query = Cliente::query();
        $this->select();
        $this->join();
        $this->filter();
        $this->groupBy();

        return $this->query;
    }

    private function select()
    {
        $this->query->select([
            'nome_usuario',
            'titulo',
            DB::raw('COUNT(*) AS total_linha')
        ]);
    }

    private function join(): void
    {
        $this->query->join('albuns', 'clientes.id', 'albuns.cliente_id');
    }

    private function filter()
    {
        if (!empty($this->dados['nome_usuario'])) {
            $this->query->where('nome_usuario', 'LIKE', '%' . $this->dados['nome_usuario'] . '%');
        }
        
        if (!empty($this->dados['titulo'])) {
            $this->query->where('titulo', 'LIKE', '%' . $this->dados['titulo'] . '%');
        }
    }

    private function groupBy()
    {
        $this->query->groupBy([
            'nome_usuario',
            'titulo',
        ]);
    }
}

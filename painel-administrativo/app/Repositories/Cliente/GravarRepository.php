<?php

namespace App\Repositories\cliente;

use Exception;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Perfil;
use Illuminate\Support\Facades\DB;

class GravarRepository
{
    private $dados;
    private $cliente;
    private $clienteId;
    private $perfil;
    private $endereco;
    private $idEndereco;

    public function criaOuAtualiza(array $dados, $id = NULL): bool
    {
        $this->dados = $dados;
        $this->clienteId = $id;
        DB::beginTransaction();
        try {
            $this->cliente = Cliente::findOrNew($this->clienteId);
            $this->cliente->fill($this->dados);
            $this->cliente->saveOrFail();

            foreach ($this->dados['perfil'] ?? [] as $perfil) {
                $this->perfil = new Perfil();
                $this->perfil->fill($perfil);
                $this->perfil->cliente_id = $this->cliente->id;
                $this->perfil->saveOrFail();
            }
            $this->idEndereco = Endereco::where('cliente_id', $this->cliente->id)->first();
            $this->endereco = Endereco::findOrNew($this->idEndereco->id);
            $this->endereco->cep = $this->dados['cep'];
            $this->endereco->estado = $this->dados['estado'];
            $this->endereco->cidade = $this->dados['cidade'];
            $this->endereco->rua = $this->dados['rua'];
            $this->endereco->cep = $this->dados['cep'];
            $this->endereco->numero = $this->dados['numero'];
            $this->endereco->complemento = $this->dados['complemento'];
            $this->endereco->cliente_id = $this->cliente->id;
            $this->endereco->saveOrFail();

            DB::commit();
        } catch (Exception $ex) {
            info($ex);
            DB::rollBack();
            return false;
        }

        return true;
    }
}

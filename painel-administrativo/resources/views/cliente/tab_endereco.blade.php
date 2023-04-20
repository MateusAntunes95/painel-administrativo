<div class="row">
    <div class="col-sm-4">
        <label>CEP</label>
        <input type="text" name="cep" id="cep" class="form-control" value="{{ $endereco->cep }}">
    </div>
    <div class="col-sm-4">
        <label>Estado</label>
        <input name="estado" type="text" id="uf" class="form-control" value="{{ $endereco->estado }}">
    </div>
    <div class="col-sm-4">
        <label>Cidade</label>
        <input name="cidade" type="text" id="localidade" class="form-control" value="{{ $endereco->cidade }}">
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <label>Rua</label>
        <input name="rua" type="text" class="form-control" id='logradouro' value="{{ $endereco->rua }}">
    </div>
    <div class="col-sm-4">
        <label>Numero</label>
        <input name="numero" type="text" class="form-control" value="{{ $endereco->numero }}">
    </div>
    <div class="col-sm-4">
        <label>Complemento</label>
        <input name="complemento" type="text" class="form-control" value="{{ $endereco->complemento }}">
    </div>
</div>

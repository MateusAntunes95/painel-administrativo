<div class="row">
    <div class="col-sm-4">
        <label>Nome de Usuário</label>
        <input type="text" name="nome_usuario" class="form-control" value="{{ $cliente->nome_usuario ?? '' }}">
    </div>
    <div class="col-sm-4">
        <label>Nome completo</label>
        <input name="nome_completo" type="text" class="form-control" value="{{ $cliente->nome_completo }}">
    </div>
    <div class="col-sm-4">
        <label>CPF</label>
        <input name="cpf" type="text" class="form-control somente-numero cpf" maxlength="14" minlength="14" 
            value="{{ $cliente->cpf }}">
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <label>RG</label>
        <input name="rg" type="text" class="form-control rg" maxlength="12" minlength="12" value="{{ $cliente->rg }}">
    </div>
    <div class="col-sm-4">
        <label>Data de nascimento</label>
        <input name="nascimento" type="text" class="form-control" value="{{ $cliente->nascimento }}">
    </div>
    <div class="col-sm-4">
        <label>E-mail</label>
        <input name="email" type="email" class="form-control" value="{{ $cliente->email }}">
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>Telefone Celular</label>
            <input name="celular" type="text" class="form-control somente-numero celular" maxlength="14" minlength="14"
                value="{{ $cliente->celular }}">
        </div>
        <div class="col-sm-4">
            <label>Situação</label>
            <select class="form-select" name="situacao">
                <option value="ativo" {{ $cliente->situacao == 'ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="inativo" {{ $cliente->situacao == 'inativo' ? 'selected' : '' }}>Inativo</option>
                <option value="bloqueado" {{ $cliente->situacao == 'bloqueado' ? 'selected' : '' }}>Bloqueado</option>
            </select>
        </div>
    </div>
</div>

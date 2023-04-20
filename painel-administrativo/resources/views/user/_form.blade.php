<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-4">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ $user->nome }}">
            </div>
            <div class="col-sm-4">
                <label>Data de Nascimento</label>
                <input name="nascimento" type="text" class="form-control somente-numero nascimento"
                    value="{{ $user->nascimento }}">
            </div>
            <div class="col-sm-4">
                <label>Telefone Celular</label>
                <input name="celular" type="text" class="form-control somente-numero celular" maxlength="14"
                    minlength="14" value="{{ $user->celular }}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>E-mail</label>
                <input name="email" type="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="col-sm-4">
                <label>Senha</label>
                <input name="password" type="password" id="senha" class="form-control" value="{{ $user->password }}">
            </div>
            <div class="col-sm-4">
                <label>Confirmar Senha</label>
                <input type="password" id="confirmar_senha" class="form-control" required value="{{ $user->password }}">
                <p class="text-danger" id="mensagem-erro"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Situação</label>
                <select class="form-select" name="situacao">
                    <option value="ativo" {{ $user->situacao == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ $user->situacao == 'inativo' ? 'selected' : '' }}>Inativo</option>
                    <option value="bloqueado" {{ $user->situacao == 'bloqueado' ? 'selected' : '' }}>Bloqueado</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submiy" class="btn btn-success">
            Salvar
        </button>
    </div>
</div>
<script src="/js/user/_form.js"></script>

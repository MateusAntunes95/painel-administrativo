<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" value="{{ $tipoAcesso->titulo  }}" class="form-control" required>
                <input type="hidden" name="id" value="{{ $tipoAcesso->id  }}" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <label>Módulos de Acesso:</label>
                <div class="d-flex align-items-center">
                    <select class="form-select" id="modolos_acesso">
                        <option value="1">Tipos de Acesso</option>
                        <option value="2">Usuários</option>
                        <option value="3">Clientes</option>
                        <option value="4">Álbuns</option>
                        <option value="5">Relatórios</option>
                    </select>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary btn-sm ms-3" id="btn_adicionar"><i
                                class="bi bi-plus"></i> Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Módulo de acesso</th>
                    <th>Adicionar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody id="tbody">
                @if ($tipoAcesso->modulos)
                    @foreach ($tipoAcesso->modulos as $value)
                    <tr>
                        <td class="col-3"> <input name="moduloAcesso[{{ $value->id }}][modolu]" class="form-control" value="{{ $value->modulo_acesso }}">  </td>
                        <td> <input type="checkbox" name="moduloAcesso[{{ $value->id }}][adicionar]" class="form-check-input" {{ $value->adicionar ? 'checked' : '' }}></td>
                        <td> <input type="checkbox" name="moduloAcesso[{{ $value->id }}][editar]" class="form-check-input" {{ $value->editar ? 'checked' : '' }}></td>
                        <td> <input type="checkbox" name="moduloAcesso[{{ $value->id }}][excluir]" class="form-check-input" {{ $value->excluir ? 'checked' : '' }}></td>
                        <td> <input type="checkbox" name="moduloAcesso[{{ $value->id }}][visualizar]" class="form-check-input" {{ $value->visualizar ? 'checked' : '' }}></td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">
                Salvar
            </button>
        </div>
    </div>
</div>
<script src="/js/tipo_acesso/_form.js"></script>
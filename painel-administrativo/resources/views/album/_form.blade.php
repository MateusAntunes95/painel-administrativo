<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-4">
                <label>Cliente</label>
                <select name="cliente_id" class="form-select" id="cliente">
                    <option>Selecione um cliente</option>
                    @foreach ($clientes as $key => $cliente)
                    <option value="{{ $cliente->id }}" @if ($cliente->id == $album->cliente_id) selected @endif> {{
                        $cliente->nome_usuario }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label>Perfil</label>
                <select name="perfil_id" class="form-select" id="perfil">
                    @if ($perfis)
                    {{ info($perfis) }}
                    @foreach ($perfis as $key => $perfi)
                    <option value="{{ $perfi->id }}" @if ($perfi->id == $album->perfi_id) selected @endif> {{
                        $perfi->nome }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-sm-4">
                <label>Tipo de Álbum</label>
                <select name="tipo_album" class="form-select">
                    <option value="imagem" @if ($album->tipo_album == 'imagem') selected @endif>Imagem</option>
                    <option value="video" @if ($album->tipo_album == 'video') selected @endif>Vídeo</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label>Título</label>
                <input name="titulo" type="text" class="form-control" value="{{ $album->titulo }}">
            </div>
            <div class="col-sm-8">
                <label>Descrição</label>
                <textarea name="descricao" class="form-control">{{ $album->descricao }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Data de Inclusão</label>
                <input name="data_inclusao" type="date" class="form-control" value="{{ $album->data_inclusao }}">
            </div>
            <div class="col-sm-4">
                <label>Situação</label>
                <select name="situacao" class="form-select">
                    <option value="disponivel_publico" @if ($album->situacao == 'disponivel_publico') selected
                        @endif>Disponível Público</option>
                    <option value="disponivel_restrito" @if ($album->situacao == 'disponivel_restrito') selected
                        @endif>Disponível Restrito</option>
                    <option value="bloqueado" @if ($album->situacao == 'bloqueado') selected @endif>Bloqueado</option>
                    <option value="excluido" @if ($album->situacao == 'excluido') selected @endif>Excluído</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Imagem Principal:</label>
                    <input type="file" class="form-control-file" id="album-image" name="album_image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Vídeo:</label>
                    <input type="file" class="form-control-file" id="album-video" name="album_video" accept="video/mp4">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submiy" class="btn btn-success">
            Salvar
        </button>
    </div>
</div>
<script src="/js/album/_form.js"></script>
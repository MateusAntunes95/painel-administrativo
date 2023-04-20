<div class="card">
    <div class="card-header">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" data-bs-toggle="tab" href="#geral" role="tab" aria-controls="nav-home"
                    aria-selected="true">Geral</a>
                <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#endereco" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Endereço</a>
                <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Perfil</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="geral" role="tabpanel">
                @include('cliente.tab_geral')
            </div>
            <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="nav-profile-tab">
                @include('cliente.tab_endereco')
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                @include('cliente.tab_perfil')
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submiy" class="btn btn-success">
            Salvar
        </button>
    </div>
</div>
<script src="/js/cliente/_form.js"></script>

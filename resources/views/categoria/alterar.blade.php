@extends("admin_layout.index")

@section("admin_template")
<div class="px-4 container-fluid">
    <h1 class="mt-4">Categorias</h1>
    <ol class="mb-4 breadcrumb">
        <li class="breadcrumb-item active">categorias</li>
    </ol>

    <div class="mb-4 card">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Alteração da categoria {{ $categoria->id }}
        </div>
        <div class="card-body">
            <form method="POST" action="/categoria/upd">
                @csrf
                <div class="modal-body">
                <input type="hidden" name="id"
                    value="{{ $categoria->id}}"
                />

                        <div class="mb-3 form-floating">
                            <input type="text"
                                    class="form-control"
                                    id="cat_nome"
                                    name="cat_nome"
                                    placeholder="Digite o nome da categoria"
                                    value="{{ $categoria->cat_nome }}"
                                    >
                            <label for="floatingInput">Categoria</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <input type="text"
                                    class="form-control"
                                    id="cat_descricao"
                                    name="cat_descricao"
                                    placeholder="Digite "
                                    value="{{ $categoria->cat_descricao }}"
                                    >
                            <label for="floatingInput">Descrição</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

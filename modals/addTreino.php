<!-- Modal -->
<div class="modal fade" id="addFichaTreino" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFichaTreinoLabel">Cadastrar Ficha de Treino</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="fichaTreino">
                    <label>Titulo</label>
                    <input type="text" class="form-control" name="titulo">

                    <div class="d-flex">
                        <div>
                            <label>Series</label>
                            <input type="text" class="form-control" name="series">
                        </div>

                        <div>
                            <label>Repetições</label>
                            <input type="text" class="form-control" name="repeticoes">
                        </div>

                        <div>
                            <label>Carga</label>
                            <input type="text" class="form-control" name="carga">
                        </div>
                    </div>

                    <button onclick="adicionarExercicio()">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
</div>
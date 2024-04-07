<!-- Modal -->
<div class="modal fade" id="modalAdicionarExercicio" tabindex="-1" aria-labelledby="modalAdicionarExercicioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdicionarExercicioLabel">Adicionar Exercício</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="inputNovoExercicio" placeholder="Nome do novo exercício">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="adicionarExercicio()">Adicionar</button>
            </div>
        </div>
    </div>
</div>
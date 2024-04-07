<!-- Modal -->
<div class="modal fade" id="addCompromisso" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Compromisso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="compromisso">
                    <div>
                        <input type="text" class="form-control" id="event-name" placeholder="Nome do Compromisso" required>
                    <div>
                        <label for="event-start" class="form-label">Data e Hora de Início:</label>
                        <input type="datetime-local" class="form-control" id="event-start">
                    </div>
                    <div>
                        <label for="event-end" class="form-label">Data e Hora de Término:</label>
                        <input type="datetime-local" class="form-control" id="event-end">
                    </div>

                    <div>
                        <textarea class="form-control" placeholder="Digite uma observação"></textarea>
                    </div>

                    <!-- Inputs para os objetivos -->
                    <div class="mb-3">
                        <label for="objective1" class="form-label">Objetivo 1:</label>
                        <input type="text" class="form-control" id="objective1">
                    </div>
                    <div class="mb-3">
                        <label for="objective2" class="form-label">Objetivo 2:</label>
                        <input type="text" class="form-control" id="objective2">
                    </div>

                    <button id="btn-add-event">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
</div>

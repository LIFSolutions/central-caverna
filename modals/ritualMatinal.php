<div class="modal fade" id="modalRitualMatinal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar bloco</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <label for="">Defina o horário</label>
                <div class="hours mb-4">
                    <input id="comecaRitualMatinalInput" type="text" class="form-control time" placeholder="Começa">
                    <input id="terminaRitualMatinalInput" type="text" class="form-control time" placeholder="Termina">
                </div>
                <input id="descricaoRitualMatinalInput" type="text" class="form-control" placeholder="Item">
                <span class="title">Itens Adicionados</span>
                <ul id="ritualAddListMatinal" class="ritualAddListMatinal">
                    
                </ul>
                <div class="buttonsRitual">
                    <button id="adicionarRitualMatinal" class="btn btn-primary">Adicionar</button>
                    <button id="salvarRitualMatinal" class="btn btn-primary">Salvar Bloco</button>
                </div>
            </div>
        </div>
    </div>
</div>

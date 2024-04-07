<div class="modal fade" id="configPomodoro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Configuração Pomodoro</h5>
            </div>
            <div class="modal-body">
                <div class="configPomo">
                    <h3>Defina o tempo do flow</h3>
                    <p>O padrão do pomodoro de produtividade e estudos é de 30 minutos, e os intervalos curtos são de 5 minutos e os longos são de 15 minutos. 
                    Fique a vontade para personalizar ao seu dia.</p>
                    <div class="line">
                        <div>
                            <small>Produtividade</small>
                            <input type="text" class="form-control" id="produtividadeInput" data-key="produtividade" value="30">
                        </div>

                        <div>
                            <small>Estudos</small>
                            <input type="text" class="form-control" id="estudosInput" data-key="estudos" value="30">
                        </div>
                    </div>
                    <h3>Defina o tempo dos intervalos</h3>
                    <div class="line">
                        <div>
                            <small>Curto</small>
                            <input type="text" class="form-control" id="intervaloCurtoInput" data-key="intervalo-curto" value="5">
                        </div>

                        <div>
                            <small>Longo</small>
                            <input type="text" class="form-control" id="intervaloLongoInput" data-key="intervalo-longo" value="5">
                        </div>
                    </div>
                    <button id="btnSaveConfig">Salvar configurações</button>
                </div>
            </div>
        </div>
    </div>
</div>
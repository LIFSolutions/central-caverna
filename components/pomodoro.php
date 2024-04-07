<div class="pomoBox">
    <div class="head">
        <div>
            <img src="../assets/images/pomodoro.svg">
        </div>

        <div>
            <img src="../assets/images/icons/icChart.svg" class="chart">
            <img src="../assets/images/icons/icConfig.svg" data-bs-toggle="modal" data-bs-target="#configPomodoro">
        </div>
    </div>
    <hr>
    <div class="actions">
        <div class="flowSelect">
            <span class="tilt">Selecione <br>o Flow</span>
            <button id="produtividade">Produtividade</button>
            <button id="estudos">Estudos</button>
        </div>
        <div class="setInterval">
            <span class="tilt">Selecione <br>o Intervalo</span>
            <button id="curto">Curto</button>
            <button id="longo">Longo</button>
        </div>
    </div>
    <div class="timer">
        <div class="buttons">
            <button id="playButton" class="btn btn-primary">
                <img src="../assets/images/icons/icPlay.svg">
                <span>Iniciar</span>
            </button>
            <button id="pauseButton" class="btn btn-primary">
                <img src="../assets/images/icons/icPause.svg">
                <span>Pausar</span>
            </button>
            <button id="resetButton" class="btn btn-primary">
                <img src="../assets/images/icons/icReset.svg">
                <span>Resetar</span>
            </button>
        </div>

        <div class="timerPomodo">
            <span id="timer">30:00</span>
        </div>
    </div>
    <div class="stats" style="display:none;">
        <div class="title">
            <div></div>

            <div>
                <label>Meta</label>
                <label>Atual</label>
                <label>Faltam</label>
            </div>
        </div>

        <div class="total">
            <div>
                <span>Total de pomodoros hoje</span>
            </div>

            <div>
                <input type="text" class="form-control" id="totalPomodoroHojeMeta" value="">
                <input type="text" class="form-control" id="totalPomodoroHojeAtual" value="">
                <input type="text" class="form-control" id="totalPomodoroHojeFaltam" value="">
            </div>
        </div>

        <div class="minProdutividade">
            <div>
                <span>Minutos em Flow Produtividade</span>
            </div>

            <div>
                <input type="text" class="form-control" id="minPomodoroProdutividadeMeta" value="">
                <input type="text" class="form-control" id="minPomodoroProdutividadeAtual" value="">
                <input type="text" class="form-control" id="minPomodoroProdutividadeFaltam" value="">
            </div>
        </div>

        <div class="minEstudos">
            <div>
                <span>Minutos em Flow Estudos</span>
            </div>

            <div>
                <input type="text" class="form-control" id="minPomodoroEstudosMeta" value="">
                <input type="text" class="form-control" id="minPomodoroEstudosAtual" value="">
                <input type="text" class="form-control" id="minPomodoroEstudosFaltam" value="">
            </div>
        </div>
    </div>
</div>
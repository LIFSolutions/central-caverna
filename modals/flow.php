<div class="modal fade" id="modalFlow" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inicie o Flow Caverna</h5>
            </div>
            <div class="modal-body">
                <div class="flowStart">
                    <p>Antes de iniciar o Ritual, certifique-se que não há nenhuma pendência a ser resolvida.
                    O Flow Caverna será liberado após a marcação de todos os itens abaixo:</p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check1" data-src>
                        <label class="form-check-label" for="check1">Preparar Ambiente <small>Confortável e Organizado</small></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check2" data-src>
                        <label class="form-check-label" for="check2">Colocar celular afastado</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check3" data-src>
                        <label class="form-check-label" for="check3">Garrafa de água</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check4" data-src>
                        <label class="form-check-label" for="check4">Mural de Visualização <small>1 minuto de exercício</small></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check5" data-src>
                        <label class="form-check-label" for="check5">Verificar Agenda do Dia <small>Compromissos/Objetivo/Tarefas</small></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check6" data-src>
                        <label class="form-check-label" for="check6">Organizar Setup de Trabalho <small>Apenas o necessário</small></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check7" data-src>
                        <label class="form-check-label" for="check7">Exercício Mindfulness <small>Clique e faça o exercicio</small></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check8" data-src>
                        <label class="form-check-label" for="check8">Rito da Caverna <small>Assista todos os dias</small></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check9" data-src>
                        <label class="form-check-label" for="check9">Configurar Metas do Pomodoro <small>Opcional você pode alterar depois</small></label>
                    </div>

                    <button class="iniciarFlow" id="iniciarFlowBtn" disabled>Ativar Flow Caverna</button>
                </div>
                <div class="iframe" id="mural" style="display:none;">
                    <div class="muralImages">
                        <div class="boxImage" onclick="uploadMuralVisualizacao(this)">
                            <img src="../assets/images/icons/icImage.svg">
                            <small>Adicionar</small>
                        </div>
                        <div class="boxImage" onclick="uploadMuralVisualizacao(this)">
                            <img src="../assets/images/icons/icImage.svg">
                            <small>Adicionar</small>
                        </div>
                        <div class="boxImage" onclick="uploadMuralVisualizacao(this)">
                            <img src="../assets/images/icons/icImage.svg">
                            <small>Adicionar</small>
                        </div>
                        <div class="boxImage" onclick="uploadMuralVisualizacao(this)">
                            <img src="../assets/images/icons/icImage.svg">
                            <small>Adicionar</small>
                        </div>
                        <div class="boxImage" onclick="uploadMuralVisualizacao(this)">
                            <img src="../assets/images/icons/icImage.svg">
                            <small>Adicionar</small>
                        </div>
                        <div class="boxImage" onclick="uploadMuralVisualizacao(this)">
                            <img src="../assets/images/icons/icImage.svg">
                            <small>Adicionar</small>
                        </div>
                    </div>
                </div>

                <div class="iframe" id="agenda" style="display:none;">
                    <p>Compromissos do Dia</p>
                    <ul>
                        <li>Reunião de Alinhamento <small>11:00 - 12:00 </small></li>
                        <li>Verificar pagamentos<small>12:00 - 13:00</small></li>
                        <li>Agendamento de Exames <small>13:00 - 14:00</small></li>
                    </ul>
                    <hr>
                    <p>Objetivos do Dia</p>
                    <ul>
                        <li>Beber 3L de Água</li>
                        <li>Finalizar Campanhas</li>
                    </ul>
                </div>

                <div class="iframe" id="mindufless" style="display:none;">
                    <iframe src="https://www.youtube.com/embed/8EeBDuQCV0A?si=NpHGiaiKf2Jgnbip" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="iframe" id="rito" style="display:none;">
                    <iframe class="video-iframe" src="https://www.youtube.com/embed/Nunkt35xBPM?controls=0&modestbranding=1&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div class="iframe" id="configPomodoroCheck" style="display:none;">
                    <p>Informe suas metas diárias abaixo</p>
                    <small>"Opcional" você pode alterar depois</small>
                    <label>Sessões Pomodoro</label>
                    <input type="text" class="form-control">

                    <label>Flow Produtividade</label>
                    <input type="text" class="form-control">

                    <label>Flow Estudos</label>
                    <input type="text" class="form-control">
                    <button>Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
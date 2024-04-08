$(document).ready(function() {
    var statusPomodoro = localStorage.getItem('statusPomodoro');
    var sessaoAtiva = localStorage.getItem('sessaoAtiva');
    if (statusPomodoro === 'Finalizado' && sessaoAtiva === 'pomodoro') {
        var intervaloAtivo = localStorage.getItem('intervaloAtivo');
        if (intervaloAtivo !== '') {
            iniciarIntervalo(intervaloAtivo);
        }
    }

    $('#fecharIntervalo').click(function() {
        $('.intervalo').hide(); // Esconder a div de intervalo
        localStorage.removeItem('intervaloAtivo'); // Remover estado do intervalo do localStorage
        localStorage.removeItem('tempoIntervaloRestante'); // Remover tempo restante do intervalo do localStorage
        window.location.reload(); // Recarregar a página
    });
    
      if (localStorage.getItem('switchActivated')) {
        // Verifica se o conteúdo do parágrafo já foi modificado
        if (!$('.removeMessage').hasClass('activated')) {
            $('.removeMessage').html('<p>O Flow Caverna já está ativado.</p>').addClass('activated');
        }
    }

    // Define o evento de mudança do switch
    // Verifica e define o estado do switch ao carregar a página
    if (localStorage.getItem('switchActivated')) {
        $('#switch-flat').prop('checked', true);
        $('.removeMessage').html('<p>O Flow Caverna já está ativado.</p>').addClass('activated');
        $('.filter').removeClass('filter').addClass('hidden');
        $('#flowStatus').text('Ativo');
    } else {
        $('#switch-flat').prop('checked', false);
        $('.removeMessage').html('<p>Faça o Ritual de ativação do Flow Caverna para a liberação das funcionalidades</p>').removeClass('activated');
        $('.hidden').removeClass('hidden').addClass('filter');
        $('#flowStatus').text('Desativado');
    }

    // Defina o evento de alteração para o switch
    $('#switch-flat').change(function() {
        // Verifica se o switch foi marcado
        if ($(this).is(':checked')) {
            // Substitui o conteúdo do parágrafo por '&nbsp;'
            $('.removeMessage').html('<p>O Flow Caverna já está ativado.</p>').addClass('activated');

            // Define a chave 'switchActivated' como verdadeira no armazenamento local
            localStorage.setItem('switchActivated', true);

            // Oculta os elementos filtrados e atualiza o status
            $('.filter').removeClass('filter').addClass('hidden');
            $('#flowStatus').text('Ativo');

            // Verifica se o modal já foi aberto hoje
            var modalFlowOpenedToday = localStorage.getItem('modalFlowOpenedToday');
            if (!modalFlowOpenedToday) {
                $('#modalFlow').modal('show');
                localStorage.setItem('modalFlowOpenedToday', true);
            }
        } else {
            // Atualiza o conteúdo do parágrafo e remove o armazenamento local
            $('.removeMessage').html('<p>O Flow Caverna está desativado.</p>').removeClass('activated');
            localStorage.removeItem('switchActivated');

            // Exibe os elementos filtrados e atualiza o status
            $('.hidden').removeClass('hidden').addClass('filter');
            $('#flowStatus').text('Desativado');
        }
    });
    

    function verificarCheckboxes() {
        // Array com os IDs dos checkboxes
        var idsCheckboxes = ["check1", "check2", "check3", "check4", "check5", "check6", "check7", "check8"];
        
        // Verifica se todos os checkboxes estão marcados
        for (var i = 0; i < idsCheckboxes.length; i++) {
            if (!$("#" + idsCheckboxes[i]).prop('checked')) {
                return false; // Retorna falso se algum checkbox não estiver marcado
            }
        }
        return true; // Retorna verdadeiro se todos os checkboxes estiverem marcados
    }

    // Evento para verificar os checkboxes quando houver uma alteração
    $('.form-check-input').on('input', function() {
        if (verificarCheckboxes()) {
            $('#iniciarFlowBtn').prop('disabled', false); // Ativa o botão se todos os checkboxes estiverem marcados
        } else {
            $('#iniciarFlowBtn').prop('disabled', true); // Desativa o botão se algum checkbox não estiver marcado
        }
    });

    // Evento para esconder o modal quando o botão é clicado
    $('#iniciarFlowBtn').click(function() {
        $('#modalFlow').modal('hide');
    });

    $('.time').mask('00:00');

    $('[data-tilt]').tilt({
        scale: 1.3, 
        maxTilt: 30, 
        perspective: 2000, 
        glare: true, 
        maxGlare: 0.5 
    });

    $('#btnSaveConfig').click(function() {
        var produtividade = parseInt($('#produtividadeInput').val());
        var estudos = parseInt($('#estudosInput').val());
        var intervaloCurto = parseInt($('#intervaloCurtoInput').val());
        var intervaloLongo = parseInt($('#intervaloLongoInput').val());

        // Converter para minutos
        produtividade = produtividade * 60;
        estudos = estudos * 60;
        intervaloCurto = intervaloCurto * 60;
        intervaloLongo = intervaloLongo * 60;

        localStorage.setItem('produtividade', produtividade);
        localStorage.setItem('estudos', estudos);
        localStorage.setItem('intervaloCurto', intervaloCurto);
        localStorage.setItem('intervaloLongo', intervaloLongo);
        
        // Habilitar o botão de iniciar Pomodoro após salvar as configurações
        document.getElementById("playButton").disabled = false;
        $('#configPomodoro').modal('hide');
    });

    var intervaloAtivo = ''; // Variável para armazenar o tipo de intervalo selecionado
    var tempoIntervaloRestante = localStorage.getItem('tempoIntervaloRestante'); // Recuperar tempo restante do intervalo do localStorage

    // Restaurar estado do intervalo após atualização da página, se aplicável
    if (localStorage.getItem('intervaloAtivo') !== null && localStorage.getItem('intervaloAtivo') !== '') {
        var tipoIntervalo = localStorage.getItem('intervaloAtivo');
        iniciarIntervalo(tipoIntervalo);
    }

    setInterval(function() {
        var tempoRestante = document.getElementById("timer").textContent;
        localStorage.setItem('tempoRestante', tempoRestante); // Atualizar tempo do contador no localStorage
    }, 1000);
    
    // Evento ao clicar em "Iniciar"
    $('#playButton').click(function() {
        var tempoRestante = document.getElementById("timer").textContent;
        localStorage.setItem('tempoRestante', tempoRestante); // Salvar tempo do contador no localStorage
        iniciarContador(tempoRestante);
        $(this).prop('disabled', true); // Desabilitar o botão de iniciar
    });


    // Evento ao clicar em "Resetar"
    $('#resetButton').click(function() {
        // Exibir a modal
        $('#resetModal').modal('show');
    });
    
    // Ao clicar no botão SIM
    $('#confirmYes').click(function() {
        // Habilitar o botão de iniciar
        $('#playButton').prop('disabled', false);
        // Fechar a modal
        $('#resetModal').modal('hide');
    });
    
    // Ao clicar no botão NÃO ou no botão fechar
    $('.modal-footer button[data-bs-dismiss="modal"]').click(function() {
        // Fechar a modal
        $('#resetModal').modal('hide');
    });

    // Evento ao clicar em "Estudos"
    $('#estudos').click(function() {
        var tempoEstudos = localStorage.getItem('estudos');
        var tempoProdutividade = localStorage.getItem('produtividade');
        if (!tempoProdutividade || !tempoEstudos) {
            alert("Configure o pomodoro primeiramente para ativar");
            return;
        }
    
        if (tempoEstudos && $('#playButton').prop('disabled') === false) {
            configurarTempo(tempoEstudos);
            $('#estudos').addClass('activeEstudos');
            $('#produtividade').removeClass('activeProdutividade');
        } else {
            alert("Finalize seu pomodoro");
        }
    });
    
    // Evento ao clicar em "Produtividade"
    $('#produtividade').click(function() {
        var tempoProdutividade = localStorage.getItem('produtividade');
        var tempoEstudos = localStorage.getItem('estudos');
        if (!tempoProdutividade || !tempoEstudos) {
            alert("Configure o pomodoro primeiramente para ativar");
            return;
        }
    
        if (tempoProdutividade && $('#playButton').prop('disabled') === false) {
            configurarTempo(tempoProdutividade);
            $('#produtividade').addClass('activeProdutividade');
            $('#estudos').removeClass('activeEstudos');
        } else {
            alert("Finalize seu pomodoro");
        }
    });

    // Evento ao clicar em "Curto"
    $('#curto').click(function() {
        var intervaloCurto = localStorage.getItem('intervaloCurto');
        $(this).addClass('active');
        $('#longo').removeClass('active');
        intervaloAtivo = 'curto';
        localStorage.setItem('intervaloAtivo', intervaloAtivo); // Salvar estado do intervalo no localStorage
    });

    // Evento ao clicar em "Longo"
    $('#longo').click(function() {
        var intervaloLongo = localStorage.getItem('intervaloLongo');
        $(this).addClass('active');
        $('#curto').removeClass('active');
        intervaloAtivo = 'longo';
        localStorage.setItem('intervaloAtivo', intervaloAtivo); // Salvar estado do intervalo no localStorage
    });

    // Verificar se o Pomodoro foi finalizado para iniciar o intervalo
    setInterval(function() {
        var tempoRestante = document.getElementById("timer").textContent;
        if (tempoRestante === "00:00" && intervaloAtivo !== '') {
            iniciarIntervalo(intervaloAtivo);
        }
    }, 1000);
});

function iniciarIntervalo(tipoIntervalo) {
    var intervaloElement = $('.intervalo');
    intervaloElement.show();

    var tempoIntervalo;
    if (tipoIntervalo === 'curto') {
        tempoIntervalo = localStorage.getItem('intervaloCurto');
    } else {
        tempoIntervalo = localStorage.getItem('intervaloLongo');
    }

    var tempoTotal = tempoIntervalo;
    var timerIntervalo = setInterval(function() {
        var minutos = Math.floor(tempoTotal / 60);
        var segundosRestantes = tempoTotal % 60;
        intervaloElement.find('h5').text(minutos.toString().padStart(2, "0") + ":" + segundosRestantes.toString().padStart(2, "0"));
        tempoTotal--;

        if (tempoTotal < 0) {
            clearInterval(timerIntervalo);
            intervaloElement.hide();
            localStorage.removeItem('intervaloAtivo'); // Remover estado do intervalo do localStorage
            localStorage.removeItem('tempoIntervaloRestante'); // Remover tempo restante do intervalo do localStorage
            window.location.reload(); // Recarregar a página após o intervalo terminar
        } else {
            localStorage.setItem('tempoIntervaloRestante', tempoTotal); // Salvar tempo restante do intervalo no localStorage
        }
    }, 1000);

    // Restaurar tempo restante do intervalo após atualização da página
    if (tempoIntervaloRestante !== null && tempoIntervaloRestante !== '') {
        var tempoTotalRestante = parseInt(tempoIntervaloRestante);
        var minutosRestantes = Math.floor(tempoTotalRestante / 60);
        var segundosRestantes = tempoTotalRestante % 60;
        intervaloElement.find('h5').text(minutosRestantes.toString().padStart(2, "0") + ":" + segundosRestantes.toString().padStart(2, "0"));
    }
}
function configurarTempo(tempoEmMinutos) {
    var timerElement = document.getElementById("timer");
    var minutos = Math.floor(tempoEmMinutos / 60);
    var segundosRestantes = tempoEmMinutos % 60;
    timerElement.textContent = minutos.toString().padStart(2, "0") + ":" + segundosRestantes.toString().padStart(2, "0");
}

// INICIAR POMODORO:
var timerInterval;

document.getElementById("playButton").addEventListener("click", function() {
    iniciarContador();
    this.disabled = true;
    localStorage.setItem("statusPomodoro", "Iniciado");
    localStorage.setItem("sessaoAtiva", "pomodoro");
});

document.getElementById("pauseButton").addEventListener("click", function() {
    clearInterval(timerInterval);
    this.classList.add("active");
    document.getElementById("playButton").disabled = false;
});

document.getElementById("resetButton").addEventListener("click", function() {
    document.getElementById("timer").textContent = "30:00";
    document.getElementById("playButton").disabled = false;
    document.getElementById("pauseButton").classList.remove("active");

    clearInterval(timerInterval);

    localStorage.removeItem("statusPomodoro");
    localStorage.removeItem("sessaoAtiva");
});

function iniciarContador(tempoInicial) {
    var timerElement = document.getElementById("timer");
    var tempo = tempoInicial.split(":");
    var minutos = parseInt(tempo[0]);
    var segundos = parseInt(tempo[1]);
    
    var segundosTotais = minutos * 60 + segundos;

    // Atualiza o contador imediatamente
    atualizarContador();

    timerInterval = setInterval(atualizarContador, 1000); // Define a atualização a cada segundo

    function atualizarContador() {
        minutos = Math.floor(segundosTotais / 60);
        segundosRestantes = segundosTotais % 60;
        timerElement.textContent = minutos.toString().padStart(2, "0") + ":" + segundosRestantes.toString().padStart(2, "0");

        if (segundosTotais <= 0) {
            clearInterval(timerInterval);
            var audio = new Audio('../assets/notification.mp3');
            audio.play();
            localStorage.setItem("contadorFinalizado", "Sim");
            timerElement.textContent = "00:00";
        }

        segundosTotais--;
    }
}

const chartImage = document.querySelector('.chart');
    const statsDiv = document.querySelector('.stats');

    chartImage.addEventListener('click', function() {
        // Alternando a visibilidade da div stats
        if (statsDiv.style.display === 'none') {
            statsDiv.style.display = 'block';
        } else {
            statsDiv.style.display = 'none';
        }
    });

    function ocultarTodosIframes() {
        var iframes = document.querySelectorAll(".iframe");
        iframes.forEach(function(iframe) {
            iframe.style.display = "none";
        });
    }

    function ocultarIframeAposDelay(iframe, delay) {
        setTimeout(function() {
            iframe.style.display = "none";
        }, delay);
    }

    // Função para mostrar o iframe correspondente quando um checkbox específico for marcado
    function mostrarIframe(checkboxId, iframeId, videoDuration) {
        var checkbox = document.getElementById(checkboxId);
        var iframe = document.getElementById(iframeId);
        var video = iframe.querySelector("video");
    
        checkbox.addEventListener("change", function() {
            if (checkbox.checked) {
                ocultarTodosIframes(); // Oculta todos os iframes antes de mostrar o novo
                iframe.style.display = "block";
                if (iframeId === "mindufless") {
                    video.play(); // Inicia a reprodução do vídeo
    
                    // Adiciona um evento para verificar se o vídeo foi reproduzido completamente
                    video.addEventListener("ended", function() {
                        // Habilita o próximo check após o término do vídeo
                        document.getElementById("check8").disabled = false;
                    });
                }
            } else {
                iframe.style.display = "none";
                // Pausa o vídeo quando o checkbox é desmarcado
                if (video) {
                    video.pause();
                }
            }
        });
    }

    function ocultarTodosIframes() {
        var iframes = document.querySelectorAll(".iframe");
        iframes.forEach(function(iframe) {
            iframe.style.display = "none";
        });
    }


    // Mostrar o iframe do mural quando o checkbox correspondente for marcado
    mostrarIframe("check4", "mural", 60000); // 1 minuto em milissegundos

    // Mostrar o iframe da agenda quando o checkbox correspondente for marcado
    mostrarIframe("check5", "agenda", 0);

    // Mostrar o iframe do mindfulness quando o checkbox correspondente for marcado
    mostrarIframe("check7", "mindufless", 0);

    // Mostrar o iframe do rito quando o checkbox correspondente for marcado
    mostrarIframe("check8", "rito", 0);

    // Mostrar o iframe do configPomodoro quando o checkbox correspondente for marcado
    mostrarIframe("check9", "configPomodoroCheck", 0);

    document.getElementById("check6").addEventListener("change", function() {
        // Verifica se o checkbox está marcado
        if (this.checked) {
            // Fecha todos os iframes abertos
            ocultarTodosIframes();
        }
    });

    function fecharIframeAtual() {
        var iframes = document.querySelectorAll(".iframe");
        iframes.forEach(function(iframe) {
            iframe.style.display = "none";
            var player = new YT.Player(iframe.querySelector("iframe").id);
            player.stopVideo(); // Parar o vídeo
        });
    }
    
    // Adicionar evento de escuta para cada checkbox de vídeo
    document.getElementById("check7").addEventListener("change", function() {
        // Verifica se o checkbox foi marcado
        if (this.checked) {
            // Fecha o iframe atual antes de iniciar o novo
            fecharIframeAtual();
            // Exibe o iframe do vídeo mindufless
            document.getElementById("mindufless").style.display = "block";
            var player = new YT.Player("mindufless");
            player.playVideo(); // Inicia o vídeo
        } else {
            // Se o checkbox for desmarcado, fecha o iframe atual
            fecharIframeAtual();
        }
    });
    
    document.getElementById("check8").addEventListener("change", function() {
        // Verifica se o checkbox foi marcado
        if (this.checked) {
            // Fecha o iframe atual antes de iniciar o novo
            fecharIframeAtual();
            // Exibe o iframe do vídeo rito
            document.getElementById("rito").style.display = "block";
            var player = new YT.Player("rito");
            player.playVideo(); // Inicia o vídeo
        } else {
            // Se o checkbox for desmarcado, fecha o iframe atual
            fecharIframeAtual();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Função para fechar a modal
    function fecharModal() {
        document.getElementById('configPomodoroCheck').style.display = 'none';
        document.getElementById('confirmPomodoroCheck').style.display = 'none';
    }

    // Adiciona um evento de clique ao botão confirmPomodoro
    document.querySelector('.confirmPomodoro').addEventListener('click', fecharModal);

    // Adiciona um evento de clique ao botão confirmPomodoroBtn
    document.querySelector('.confirmPomodoroBtn').addEventListener('click', fecharModal);
    });

    const linksMenu = document.querySelector('.links');
const arrowIcon = document.querySelector('.arrow');
const dropdown = document.querySelector('.dropdownItens');

// Função para fechar o menu e remover a classe 'active' do ícone de seta
function fecharMenu() {
    dropdown.style.display = 'none';
    arrowIcon.classList.remove('active');
}

// Adiciona um event listener para cliques no menu
linksMenu.addEventListener('click', function(event) {
    // Previne que o clique se propague para o documento, evitando que o evento de fechamento seja disparado imediatamente
    event.stopPropagation();

    // Verifica se o dropdown está visível
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'block';
        arrowIcon.classList.add('active');
    } else {
        fecharMenu();
    }
});

// Adiciona um event listener para cliques no documento inteiro
document.addEventListener('click', function(event) {
    const targetElement = event.target;

    // Verifica se o clique foi fora do menu
    if (!targetElement.closest('.links')) {
        fecharMenu();
    }
});

function toggleVideo(image) {
    var iframe = image.nextElementSibling;
    if (iframe.style.display === "none") {
        iframe.style.display = "block";
        image.style.display = "none";
        iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    } else {
        iframe.style.display = "none";
        image.style.display = "block";
        iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    }
}
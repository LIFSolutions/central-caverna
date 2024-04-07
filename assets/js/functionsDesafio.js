document.addEventListener("DOMContentLoaded", function() {
    function getMonthName(month) {
        const months = [
            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
        ];
        return months[month];
    }

    function formatDay(day) {
        return day < 10 ? '0' + day : day;
    }

    const dataAtual = new Date();
    const dataFormatada = formatDay(dataAtual.getDate()) + ' de ' + getMonthName(dataAtual.getMonth()) + ' de ' + dataAtual.getFullYear();
    document.getElementById('dateNow').innerText = dataFormatada;

    function updateMarking(clickedDay, isPositive) {
        const clickedElement = document.getElementById('day' + clickedDay);

        if (!clickedElement.classList.contains('positiveCheck') && !clickedElement.classList.contains('negativeCheck')) {
            clickedElement.classList.remove('positiveCheck', 'negativeCheck');

            localStorage.setItem('day' + clickedDay, isPositive ? '+1' : '-1');

            if (isPositive) {
                clickedElement.classList.add('positiveCheck');
                clickedElement.querySelector('span').innerText = '+1';
                document.getElementById('positiveButton').classList.add('active');
                document.getElementById('negativeButton').classList.remove('active');
            } else {
                clickedElement.classList.add('negativeCheck');
                clickedElement.querySelector('span').innerText = '-1';
                document.getElementById('negativeButton').classList.add('active');
                document.getElementById('positiveButton').classList.remove('active');
            }
        }
    }

    function loadMarkings() {
        for (let i = 0; i < 60; i++) {
            const mark = localStorage.getItem('day' + i);
            if (mark) {
                const element = document.getElementById('day' + i);
                element.querySelector('span').innerText = mark;
                element.classList.add(mark.charAt(0) === '+' ? 'positiveCheck' : 'negativeCheck');
            }
        }
    }

    function loadActiveButtonState() {
        const activeButton = localStorage.getItem('activeButton');
        if (activeButton) {
            document.getElementById(activeButton).classList.add('active');
        }
    }

    loadMarkings();
    loadActiveButtonState();
    let isPositiveSelected = false;


    document.getElementById('positiveButton').addEventListener('click', function() {
        updateMarking(0, true);
        isPositiveSelected = true; // Define o estado como positivo
        localStorage.setItem('activeButton', 'positiveButton');
    });

    document.getElementById('negativeButton').addEventListener('click', function() {
        updateMarking(0, false);
        isPositiveSelected = false; // Define o estado como negativo

        localStorage.setItem('activeButton', 'negativeButton');
    });

    // Adicionando evento de clique ao botão "Enviar"
    document.getElementById('submitButton').addEventListener('click', function() {
        checkAndShowMessage(isPositiveSelected); // Verifica e exibe a mensagem com base no botão selecionado
    });

    // Função para verificar e exibir a mensagem com base no botão selecionado
    function checkAndShowMessage(isPositive) {
        const messageInfo = document.querySelector('.messageInfo');
        const positiveMessage = document.querySelector('.positiveMessage');
        const negativeMessage = document.querySelector('.negativeMessage');
        const textarea = document.querySelector('.send textarea');

        // Verifica se o textarea não está vazio
        if (textarea.value.trim() !== '') {
            if (isPositive) {
                positiveMessage.style.display = 'block'; // Exibe a mensagem positiva
                negativeMessage.style.display = 'none'; // Esconde a mensagem negativa
            } else {
                negativeMessage.style.display = 'block'; // Exibe a mensagem negativa
                positiveMessage.style.display = 'none'; // Esconde a mensagem positiva
            }
            messageInfo.style.display = 'block'; // Exibe a div messageInfo
        }
    }
    
    const comecarButton = document.getElementById('btnComecar');

    comecarButton.addEventListener('click', function() {
        const selectDiv = document.querySelector('.select');
        selectDiv.style.display = 'none';

        const desafioOptions = document.querySelector('.desafioOptions');
        desafioOptions.style.display = 'block';

        const steps = document.querySelectorAll('.desafioOptions > div');
        for (let i = 0; i < steps.length; i++) {
            if (steps[i].classList.contains('step1')) {
                steps[i].style.display = 'block';
            } else {
                steps[i].style.display = 'none';
            }
        }
    });

    const nextButtons = document.querySelectorAll('.next');
    nextButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentStep = this.parentElement.parentElement;
            const nextStep = currentStep.nextElementSibling;

            currentStep.style.display = 'none';

            if (nextStep) {
                nextStep.style.display = 'block';
            } else {
                const modal = document.getElementById('modalDesafio');
                const bootstrapModal = bootstrap.Modal.getInstance(modal);
                bootstrapModal.hide();
            }
        });
    });

    const backButtons = document.querySelectorAll('.back');
    backButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentStep = this.parentElement.parentElement;
            const previousStep = currentStep.previousElementSibling;

            currentStep.style.display = 'none';
            previousStep.style.display = 'block';
        });
    });

    function removeFilterClasses() {
        const filteredElements = document.querySelectorAll('.filter');

        filteredElements.forEach(element => {
            element.classList.remove('filter');
        });
    }

    const modalDesafio = document.getElementById('modalDesafio');
    modalDesafio.addEventListener('hidden.bs.modal', function () {
        if (!localStorage.getItem('desafioIniciado')) {
            removeFilterClasses();
        }
    });

    const comecarDesafioButton = document.querySelector('.iniciarDesafio');

    function iniciarDesafio() {
        localStorage.setItem('desafioIniciado', true);
        removeFilterClasses();

        const activeDayDiv = document.querySelector('.activeDay');
        activeDayDiv.style.display = '';

        localStorage.setItem('activeDayShown', true);
    }

    comecarDesafioButton.addEventListener('click', function() {
        const modal = document.getElementById('modalDesafio');
        const bootstrapModal = bootstrap.Modal.getInstance(modal);
        bootstrapModal.hide();
        iniciarDesafio();
        window.location.reload();
    });

    window.onload = function() {
        const desafioIniciadoLocal = localStorage.getItem('desafioIniciado');
        if (desafioIniciadoLocal) {
            removeFilterClasses();
        }
    };

    function verificarDesafioIniciado() {
        const desafioIniciadoLocal = localStorage.getItem('desafioIniciado');
        const activeDayShown = localStorage.getItem('activeDayShown');
        
        if (desafioIniciadoLocal && activeDayShown) {
            const activeDayDiv = document.querySelector('.activeDay');
            activeDayDiv.style.display = '';
        }
    }

    verificarDesafioIniciado();

    const desafioIniciado = localStorage.getItem('desafioIniciado');

    if (desafioIniciado === 'true') {
    const btnCriarDesafio = document.querySelector('.buttonDesafio');
    const btnDesafioAtivado = document.querySelector('.buttonActive');

    btnCriarDesafio.style.display = 'none';
    btnDesafioAtivado.style.display = '';
    }

function atualizarContador() {
    const limiteHora = 19;
    const limiteMinuto = 0;
    const limiteSegundo = 0;

    const agora = new Date();
    const horaAtual = agora.getHours();
    const minutoAtual = agora.getMinutes();
    const segundoAtual = agora.getSeconds();

    let horasRestantes, minutosRestantes, segundosRestantes;

    if (horaAtual < limiteHora || (horaAtual === limiteHora && minutoAtual < limiteMinuto)) {
        horasRestantes = limiteHora - horaAtual - 1;
        minutosRestantes = 59 - minutoAtual;
        segundosRestantes = 59 - segundoAtual;
    } else {
        horasRestantes = 23 - horaAtual + limiteHora;
        minutosRestantes = 59 - minutoAtual;
        segundosRestantes = 59 - segundoAtual;
    }

    if (minutosRestantes < 0) {
        minutosRestantes += 60;
    }
    if (segundosRestantes < 0) {
        segundosRestantes += 60;
    }

    const horasFormatadas = formatarNumero(horasRestantes);
    const minutosFormatados = formatarNumero(minutosRestantes);
    const segundosFormatados = formatarNumero(segundosRestantes);

    const contador = document.querySelector('.activeDay h3');
    contador.textContent = `${horasFormatadas}:${minutosFormatados}:${segundosFormatados}`;

    setTimeout(atualizarContador, 1000);
}

function formatarNumero(numero) {
    return numero < 10 ? '0' + numero : numero;
}

atualizarContador();

function atualizarVisibilidade() {
    const agora = new Date();
    const horaAtual = agora.getHours();

    const activeDayDiv = document.querySelector('.activeDay');

    if (horaAtual < 19 || horaAtual >= 0 && horaAtual < 4) {
        activeDayDiv.style.display = '';
    } else {
        activeDayDiv.style.display = 'none';
    }

    if (horaAtual === 23 && agora.getMinutes() === 59) {
        setTimeout(atualizarVisibilidade, 60000); 
    } else {
        setTimeout(atualizarVisibilidade, 1000);
    }
}

atualizarVisibilidade();

function adicionarItemAbdicar(textoItem, isSugestao) {
    const ulItensAdicionados = document.querySelector(".itensAdicionadosAbdicar ul");
    const li = document.createElement("li");
    li.textContent = textoItem; 

    const removerIcone = document.createElement("img");
    removerIcone.src = "../assets/images/icons/icRemove.svg"; 
    removerIcone.alt = "Remover";
    removerIcone.classList.add("removerItem");

    removerIcone.addEventListener("click", () => {
        ulItensAdicionados.removeChild(li); 
    
        let itensAdicionados = JSON.parse(localStorage.getItem("itensAdicionadosAbdicar")) || [];
        itensAdicionados = itensAdicionados.filter((i) => i !== textoItem);
        localStorage.setItem("itensAdicionadosAbdicar", JSON.stringify(itensAdicionados));
    
        const sugestoes = document.querySelectorAll(".sugestoesAbdicar ul li");
        sugestoes.forEach((sugestao) => {
            sugestao.classList.remove("adicionado", "active");
        });
    });

    li.appendChild(removerIcone); 
    ulItensAdicionados.appendChild(li);

    let itensAdicionados = JSON.parse(localStorage.getItem("itensAdicionadosAbdicar")) || [];
    itensAdicionados.push(textoItem);
    localStorage.setItem("itensAdicionadosAbdicar", JSON.stringify(itensAdicionados));
}

const btnAdicionar = document.getElementById("btnAdicionarAbdicar");
const inputAbdicar = document.getElementById("inputAbdicar");

inputAbdicar.addEventListener("input", function() {
    if (inputAbdicar.value.trim() !== "") {
        btnAdicionar.removeAttribute("disabled");
    } else {
        btnAdicionar.setAttribute("disabled", "disabled");
    }
});

const sugestoesAbdicar = document.querySelectorAll(".sugestoesAbdicar ul li");

sugestoesAbdicar.forEach((sugestao) => {
    sugestao.addEventListener("click", () => {
        if (!sugestao.classList.contains("adicionado")) {
            sugestao.classList.add("adicionado", "active"); 
            const itemAdicionado = sugestao.textContent; 
            adicionarItemAbdicar(itemAdicionado, true);
        }
    });
});

btnAdicionar.addEventListener("click", () => {
    const inputAbdicar = document.getElementById("inputAbdicar");
    const novoItem = inputAbdicar.value.trim();
    if (novoItem !== "") {
        adicionarItemAbdicar(novoItem, false); 
        inputAbdicar.value = ""; 
    }
});

function adicionarItemFalhar(textoItem, isSugestao) {
    const ulItensAdicionados = document.querySelector(".itensAdicionadosFalhas ul");
    const li = document.createElement("li");
    li.textContent = textoItem; 

    const removerIcone = document.createElement("img");
    removerIcone.src = "../assets/images/icons/icRemove.svg"; 
    removerIcone.alt = "Remover";
    removerIcone.classList.add("removerItem"); 

    removerIcone.addEventListener("click", () => {
        ulItensAdicionados.removeChild(li); 
    
        let itensAdicionados = JSON.parse(localStorage.getItem("itensAdicionadosFalhar")) || [];
        itensAdicionados = itensAdicionados.filter((i) => i !== textoItem);
        localStorage.setItem("itensAdicionadosFalhar", JSON.stringify(itensAdicionados));
    
        const sugestoes = document.querySelectorAll(".sugestoesFalhas ul li");
        sugestoes.forEach((sugestao) => {
            sugestao.classList.remove("adicionado", "active");
        });
    });

    li.appendChild(removerIcone); 
    ulItensAdicionados.appendChild(li);

    let itensAdicionados = JSON.parse(localStorage.getItem("itensAdicionadosFalhar")) || [];
    itensAdicionados.push(textoItem);
    localStorage.setItem("itensAdicionadosFalhar", JSON.stringify(itensAdicionados));
}

const inputFalhar = document.getElementById("inputFalhar");
    const btnAdicionarFalhar = document.getElementById("btnAdicionarFalhar");

    inputFalhar.addEventListener("input", function() {
        if (inputFalhar.value.trim() !== "") {
            btnAdicionarFalhar.removeAttribute("disabled");
        } else {
            btnAdicionarFalhar.setAttribute("disabled", "disabled");
        }
    });
const sugestoesFalhas = document.querySelectorAll(".sugestoesFalhas ul li");

sugestoesFalhas.forEach((sugestao) => {
    sugestao.addEventListener("click", () => {
        if (!sugestao.classList.contains("adicionado")) {
            sugestao.classList.add("adicionado", "active"); 
            const itemAdicionado = sugestao.textContent; 
            adicionarItemFalhar(itemAdicionado, true); 
        }
    });
});

btnAdicionarFalhar.addEventListener("click", () => {
    const inputFalhar = document.getElementById("inputFalhar");
    const novoItem = inputFalhar.value.trim();
    if (novoItem !== "") {
        adicionarItemFalhar(novoItem, false); 
        inputFalhar.value = "";
    }
});




const textareaMensagem = document.querySelector(".step3 textarea");
const btnIniciarDesafio = document.querySelector(".step3 .iniciarDesafio");

btnIniciarDesafio.disabled = true;

textareaMensagem.addEventListener("input", () => {
    const mensagem = textareaMensagem.value.trim();
    if (mensagem.length > 0) {
        btnIniciarDesafio.disabled = false;
    } else {
        btnIniciarDesafio.disabled = true;
    }
    localStorage.setItem("mensagemDesafio", mensagem);
});

btnIniciarDesafio.addEventListener("click", () => {
   
});

const itensAbdicar = JSON.parse(localStorage.getItem("itensAdicionadosAbdicar")) || [];
const itensFalhar = JSON.parse(localStorage.getItem("itensAdicionadosFalhar")) || [];

const listaAbdicar = document.querySelector(".meComprometo ul");
const listaFalhar = document.querySelector(".naoFalhar ul");

function adicionarItensLista(itens, lista) {
    lista.innerHTML = ""; 

    itens.forEach((item) => {
        const li = document.createElement("li");

        li.textContent = item;
        lista.appendChild(li);
    });
}

adicionarItensLista(itensAbdicar, listaAbdicar);
adicionarItensLista(itensFalhar, listaFalhar);

function calcularDataDesafio() {
    const dataAtual = new Date();
    const diaInicio = dataAtual.getDate();
    const mesInicio = dataAtual.getMonth() + 1;
    const anoInicio = dataAtual.getFullYear();

    const dataFinal = new Date(anoInicio, mesInicio, diaInicio);
    dataFinal.setMonth(dataFinal.getMonth() + 1);

    const diaFinal = dataFinal.getDate();
    const mesFinal = dataFinal.getMonth();
    const anoFinal = dataFinal.getFullYear();

    const inicioDesafio = `${formatDay(diaInicio)}/${formatDay(mesInicio)}/${anoInicio}`;
    const finalDesafio = `${formatDay(diaFinal)}/${formatDay(mesFinal)}/${anoFinal}`;

    return { inicioDesafio, finalDesafio };
}

function formatDay(day) {
    return day < 10 ? '0' + day : day;
}

const datasDesafio = calcularDataDesafio();

document.getElementById('inicioDesafio').innerText = `Inicio: ${datasDesafio.inicioDesafio} - Finaliza em: ${datasDesafio.finalDesafio}`;
});
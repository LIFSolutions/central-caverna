document.addEventListener("DOMContentLoaded", function() {
    const treinos = JSON.parse(localStorage.getItem('treinos')) || {};
    Object.keys(treinos).forEach(id => {
        const div = document.getElementById(id);
        if (div) {
            div.classList.remove('empty');
            const img = document.createElement('img');
            img.src = '../assets/images/icons/icRemove.svg';
            div.innerHTML = '';
            div.appendChild(img);
        }
    });
});

function toggleVisibility(id) {
    const div = document.getElementById(id);
    if (div) {
        if (div.classList.contains('empty')) {
            div.classList.remove('empty');
            const img = document.createElement('img');
            img.src = '../assets/images/icons/icRemove.svg';
            div.innerHTML = '';
            div.appendChild(img);
            const treinos = JSON.parse(localStorage.getItem('treinos')) || {};
            treinos[id] = 'Remover';
            localStorage.setItem('treinos', JSON.stringify(treinos));
        } else {
            div.classList.add('empty');
            div.textContent = 'Adicionar';
            const treinos = JSON.parse(localStorage.getItem('treinos')) || {};
            delete treinos[id];
            localStorage.setItem('treinos', JSON.stringify(treinos));
        }
    }
}
var diaAtual = new Date().getDay();
var nomesDiasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
var titulos = document.querySelectorAll('.title');

titulos.forEach(function(titulo, index) {
    if (titulo.textContent === nomesDiasSemana[diaAtual]) {
        titulo.classList.add('active');
    }
});

function selecionarExercicio(exercicio, dropdownId) {
    var botaoDropdown = document.querySelector(`#${dropdownId} button.dropdown-toggle`);

    if (botaoDropdown) {
        botaoDropdown.textContent = exercicio;
        botaoDropdown.classList.remove("musculacao", "boxe", "pular-corda", "bicicleta", "futebol", "corrida-leve", "abdominal", "corridao", "banheira-de-gelo");
        botaoDropdown.classList.add(exercicio.toLowerCase().replace(/\s/g, '-'));
    }
}


var selectFicha = document.getElementById('selectFicha');
var criarFichaButton = document.getElementById('criarFicha');
var fichaEditDiv = document.querySelector('.fichaTreinoEdit');
var adicionarItemButton = document.getElementById('adicionarItem');
var listaItens = document.getElementById('listaItens');

criarFichaButton.addEventListener('click', function() {
    fichaEditDiv.style.display = 'block';
});

adicionarItemButton.addEventListener('click', function() {
    var nomeItem = document.getElementById('nomeItem').value;
    var repeticoesItem = document.getElementById('repeticoesItem').value;
    var cargaItem = document.getElementById('cargaItem').value;

    var newItem = document.createElement('li');
    newItem.textContent = nomeItem + ' com ' + repeticoesItem + ' Repetições e Carga de ' + cargaItem + 'kg';

    listaItens.appendChild(newItem);
});

var openEditButton = document.getElementById('openEditTreino');
var closeEditButton = document.getElementById('closeEditTreino');
var editDiv = document.querySelector('.contentEditTreino');

openEditButton.addEventListener('click', function() {
    editDiv.style.display = 'block';
});

closeEditButton.addEventListener('click', function() {
    editDiv.style.display = 'none';
});

function adicionarSuplemento() {
    var suplementos = document.getElementById('suplementos');

    var novoItem = document.createElement('div');
    novoItem.className = 'form-check';

    var novoCheckbox = document.createElement('input');
    novoCheckbox.className = 'form-check-input';
    novoCheckbox.type = 'checkbox';
    novoCheckbox.value = '';
    novoCheckbox.id = 'flexCheckDefault' + (suplementos.children.length - 1);

    var novoLabel = document.createElement('label');
    novoLabel.className = 'form-check-label';
    novoLabel.htmlFor = 'flexCheckDefault' + (suplementos.children.length - 1);
    novoLabel.textContent = 'Novo Suplemento';

    novoLabel.addEventListener('click', function() {
        novoLabel.contentEditable = true;
    });

    novoItem.appendChild(novoCheckbox);
    novoItem.appendChild(novoLabel);

    suplementos.insertBefore(novoItem, suplementos.lastChild);

    var mensagemSuplementos = document.getElementById('mensagemSuplementos');
    if (mensagemSuplementos) {
        mensagemSuplementos.style.display = 'none';
    }
}

function exibirMensagemSuplementosVazia() {
    var mensagemSuplementos = document.getElementById('mensagemSuplementos');
    if (mensagemSuplementos && mensagemSuplementos.textContent.trim() === '') {
        mensagemSuplementos.style.display = 'block';
    }
}

function adicionarItemListaCompras() {
    var listaCompras = document.getElementById('listaCompras');

    var novoItem = document.createElement('div');
    novoItem.className = 'form-check';

    var novoCheckbox = document.createElement('input');
    novoCheckbox.className = 'form-check-input';
    novoCheckbox.type = 'checkbox';
    novoCheckbox.value = '';
    novoCheckbox.id = 'flexCheckDefault' + (listaCompras.children.length - 1);

    var novoLabel = document.createElement('label');
    novoLabel.className = 'form-check-label';
    novoLabel.htmlFor = 'flexCheckDefault' + (listaCompras.children.length - 1);
    novoLabel.textContent = 'Novo Item';

    novoLabel.addEventListener('click', function() {
        novoLabel.contentEditable = true;
    });

    novoItem.appendChild(novoCheckbox);
    novoItem.appendChild(novoLabel);

    listaCompras.insertBefore(novoItem, listaCompras.lastChild);

    var mensagemLista = document.getElementById('mensagemLista');
    if (mensagemLista) {
        mensagemLista.style.display = 'none';
    }
}

function exibirMensagemListaVazia() {
    var mensagemLista = document.getElementById('mensagemLista');
    if (mensagemLista && mensagemLista.textContent.trim() === '') {
        mensagemLista.style.display = 'block';
    }
}

function adicionarBloco() {
    var container = document.getElementById('dieta');
    var refeicoes = container.querySelectorAll('.minCard');

    if (refeicoes.length >= 5) {
        alert('Você atingiu o limite máximo de 5 refeições.');
        return;
    }

    var novoBloco = document.createElement('div');
    novoBloco.className = 'minCard';
    novoBloco.innerHTML = '<h6 contenteditable="true">Refeição ' + (refeicoes.length + 1) + ' - Nova Refeição</h6><small contenteditable="true">' + obterHoraAtual() + '</small>';

    var mensagemRefeicoes = document.getElementById('mensagemRefeicoes');
    if (mensagemRefeicoes) {
        container.removeChild(mensagemRefeicoes);
    }

    container.insertBefore(novoBloco, container.lastChild);
}

function obterHoraAtual() {
    var data = new Date();
    var hora = data.getHours().toString().padStart(2, '0');
    var minutos = data.getMinutes().toString().padStart(2, '0');
    return hora + ':' + minutos;
}

document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.form-control');

    inputs.forEach(input => {
        const index = input.getAttribute('data-index');
        const savedValue = localStorage.getItem(`meta_${index}`);
        if (savedValue) {
            input.value = savedValue;
        }
    });

    inputs.forEach(input => {
        input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                const index = input.getAttribute('data-index');
                const value = input.value.trim();

                if (value !== '') {
                    localStorage.setItem(`meta_${index}`, value);
                } else {
                    localStorage.removeItem(`meta_${index}`);
                }
            }
        });
    });
});



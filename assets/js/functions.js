function naoEsquecer() {
    localStorage.setItem('naoEsquecer', JSON.stringify(itens));
}

function carregarItens() {
    const itensString = localStorage.getItem('naoEsquecer');
    if (itensString) {
        itens = JSON.parse(itensString);
        atualizarLista();
        verificarScroll(); 
    }
}

function verificarScroll() {
    const listaItens = document.getElementById('listaItens');
    if (listaItens.children.length >= 3) {
        listaItens.classList.add('scroll');
    } else {
        listaItens.classList.remove('scroll');
    }
}

function adicionarItem() {
    const novoItemInput = document.getElementById('novoItemInput');
    let novoItem = novoItemInput.value;

    // Capitalize a primeira letra do novo item
    novoItem = novoItem.charAt(0).toUpperCase() + novoItem.slice(1);

    if (novoItem.trim() !== '') {
        itens.push(novoItem);
        naoEsquecer();
        atualizarLista();
        verificarScroll(); 
        novoItemInput.value = '';
        $('#addNaoEsquecer').modal('hide');
    }
}

document.getElementById('novoItemInput').addEventListener('input', function() {
    let novoItem = this.value;

    // Capitalize a primeira letra do novo item
    novoItem = novoItem.charAt(0).toUpperCase() + novoItem.slice(1);

    // Atualiza o valor do campo de entrada com a primeira letra maiúscula
    this.value = novoItem;
});

function atualizarLista() {
    const listaItens = document.getElementById('listaItens');
    listaItens.innerHTML = '';
    if (itens.length === 0) {
        listaItens.innerHTML = '<li>Nenhum item adicionado ainda.</li>';
    } else {
        itens.forEach((item, index) => {
            const li = document.createElement('li');
            li.innerHTML = `<span class="default" contenteditable="true" id="item_${index}" oninput="editarItem(${index}, this.innerText)">${item}</span> <img src="../assets/images/icons/icRemoveWhite.svg" onclick="removerItem(${index})" style="cursor: pointer;">`;
            listaItens.appendChild(li);
        });
    }
}

function editarItem(index, valor) {
    itens[index] = valor;
    naoEsquecer();
}

function removerItem(index) {
    itens.splice(index, 1);
    naoEsquecer();
    atualizarLista();
    verificarScroll(); 
}

let itens = [];

document.getElementById('novoItemInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        adicionarItem();
    }
});

document.getElementById('adicionarItem').addEventListener('click', adicionarItem);
carregarItens();


function adicionarTreino() {
    const começa = document.getElementById('comecaInput').value;
    const termina = document.getElementById('terminaInput').value;
    const descricao = document.getElementById('descricaoInput').value;

    if (começa.trim() !== '' && termina.trim() !== '' && descricao.trim() !== '') {
        const novoTreino = {
            começa: começa,
            termina: termina,
            descricao: descricao
        };
        treinos.push(novoTreino);
        salvarTreinos();
        atualizarListaTreinos();
        $('#addTreinos').modal('hide');
    }
}

let treinos = [];

document.getElementById('adicionarTreino').addEventListener('click', adicionarTreino);
carregarTreinos();

function salvarTreinos() {
    localStorage.setItem('treinos', JSON.stringify(treinos));
}

function carregarTreinos() {
    const treinosString = localStorage.getItem('treinos'); // Corrigido
    if (treinosString) {
        treinos = JSON.parse(treinosString);
        atualizarListaTreinos();
    }
}

function atualizarListaTreinos() {
    const listaTreinos = document.getElementById('listaTreinos');
    listaTreinos.innerHTML = '';
    if (treinos.length === 0) {
        listaTreinos.innerHTML = '<li>Nenhum treino adicionado ainda.</li>';
    } else {
        treinos.forEach(treino => {
            const li = document.createElement('li');
            li.innerHTML = `<small>${treino.começa}</small> - <small>${treino.termina}</small> ${treino.descricao}`;
            listaTreinos.appendChild(li);
        });
    }
}

function salvarRotinas() {
    localStorage.setItem('rotinas', JSON.stringify(rotinas));
}

function carregarRotinas() {
    const rotinasString = localStorage.getItem('rotinas');
    if (rotinasString) {
        rotinas = JSON.parse(rotinasString);
        atualizarListaRotinas();
    }
}

function adicionarRotina() {
    const comeca = document.getElementById('comecaRotinaInput').value;
    const termina = document.getElementById('terminaRotinaInput').value;
    let descricao = document.getElementById('descricaoRotinaInput').value;

    // Capitalize a primeira letra da descrição
    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    if (comeca.trim() !== '' && termina.trim() !== '' && descricao.trim() !== '') {
        const novaRotina = {
            comeca: comeca,
            termina: termina,
            descricao: descricao
        };
        rotinas.push(novaRotina);
        salvarRotinas();
        atualizarListaRotinas();
        $('#addRotina').modal('hide');
    }
}

// Adiciona um evento de entrada ao campo de descrição para capitalizar a primeira letra em tempo real
document.getElementById('descricaoRotinaInput').addEventListener('input', function() {
    let descricao = this.value;

    // Capitalize a primeira letra da descrição
    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    // Atualiza o valor do campo de descrição com a primeira letra maiúscula
    this.value = descricao;
});

function atualizarListaRotinas() {
    const listaRotinas = document.getElementById('listaRotinas');
    listaRotinas.innerHTML = '';
    if (rotinas.length === 0) {
        listaRotinas.innerHTML = '<li>Nenhuma rotina adicionada ainda.</li>';
    } else {
        rotinas.forEach((rotina, index) => {
            const li = document.createElement('li');
            li.innerHTML = `<small contenteditable="true" id="comeca_${index}" oninput="editarRotina(${index}, 'comeca', this.innerText)">${rotina.comeca}</small> - <small contenteditable="true" id="termina_${index}" oninput="editarRotina(${index}, 'termina', this.innerText)">${rotina.termina}</small> <small class="default" contenteditable="true" id="descricao_${index}" oninput="editarRotina(${index}, 'descricao', this.innerText)">${rotina.descricao}</small> <img src="../assets/images/icons/icRemoveWhite.svg" onclick="removerRotina(${index})" style="cursor: pointer;">`;
            listaRotinas.appendChild(li);
        });
    }
}

function editarRotina(index, campo, valor) {
    rotinas[index][campo] = valor;
    salvarRotinas();
}

function removerRotina(index) {
    rotinas.splice(index, 1);
    salvarRotinas();
    atualizarListaRotinas();
}

let rotinas = [];

document.getElementById('descricaoRotinaInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        adicionarRotina();
    }
});

document.getElementById('adicionarRotina').addEventListener('click', adicionarRotina);
carregarRotinas();


function salvarCompromissos() {
    localStorage.setItem('compromissos', JSON.stringify(compromissos));
}

function carregarCompromissos() {
    const compromissosString = localStorage.getItem('compromissos');
    if (compromissosString) {
        compromissos = JSON.parse(compromissosString);
        atualizarListaCompromissos();
    }
}

function adicionarCompromisso() {
    const comeca = document.getElementById('comecaCompromissoInput').value;
    const termina = document.getElementById('terminaCompromissoInput').value;
    let descricao = document.getElementById('descricaoCompromissoInput').value;

    // Capitalize a primeira letra da descrição
    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    if (comeca.trim() !== '' && termina.trim() !== '' && descricao.trim() !== '') {
        const novoCompromisso = {
            comeca: comeca,
            termina: termina,
            descricao: descricao
        };
        compromissos.push(novoCompromisso);
        salvarCompromissos();
        atualizarListaCompromissos();
        $('#addCompromisso').modal('hide');
    }
}

document.getElementById('descricaoCompromissoInput').addEventListener('input', function() {
    let descricao = this.value;

    // Capitalize a primeira letra da descrição
    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    // Atualiza o valor do campo de descrição com a primeira letra maiúscula
    this.value = descricao;
});

function atualizarListaCompromissos() {
    const listaCompromissos = document.getElementById('listaCompromissos');
    listaCompromissos.innerHTML = '';
    if (compromissos.length === 0) {
        listaCompromissos.innerHTML = '<li>Nenhum compromisso adicionado ainda.</li>';
    } else {
        compromissos.forEach((compromisso, index) => {
            const li = document.createElement('li');
            li.innerHTML = `<small contenteditable="true" id="comeca_${index}" oninput="editarCompromisso(${index}, 'comeca', this.innerText)">${compromisso.comeca}</small> - <small contenteditable="true" id="termina_${index}" oninput="editarCompromisso(${index}, 'termina', this.innerText)">${compromisso.termina}</small> <small class="default" contenteditable="true" id="descricao_${index}" oninput="editarCompromisso(${index}, 'descricao', this.innerText)">${compromisso.descricao}</small> <img src="../assets/images/icons/icRemoveWhite.svg" onclick="removerCompromisso(${index})" style="cursor: pointer;">`;
            listaCompromissos.appendChild(li);
        });
    }
}

function editarCompromisso(index, campo, valor) {
    compromissos[index][campo] = valor;
    salvarCompromissos();
}

function removerCompromisso(index) {
    compromissos.splice(index, 1);
    salvarCompromissos();
    atualizarListaCompromissos();
}

let compromissos = [];

document.getElementById('descricaoCompromissoInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        adicionarCompromisso();
    }
});

document.getElementById('adicionarCompromisso').addEventListener('click', adicionarCompromisso);
carregarCompromissos();


function salvarRefeicoes() {
    localStorage.setItem('refeicoes', JSON.stringify(refeicoes));
}

function carregarRefeicoes() {
    const refeicoesString = localStorage.getItem('refeicoes'); // Corrigido
    if (refeicoesString) {
        refeicoes = JSON.parse(refeicoesString);
        atualizarListaRefeicoes();
    }
}

function adicionarRefeicao() {
    const horario = document.getElementById('horarioRefeicao').value;
    const descricao = document.getElementById('descricaoRefeicaoInput').value;

    if (horario.trim() !== '' && descricao.trim() !== '') {
        const novaRefeicao = {
            horario: horario,
            descricao: descricao
        };
        refeicoes.push(novaRefeicao);
        salvarRefeicoes();
        atualizarListaRefeicoes();
        $('#addRefeicao').modal('hide'); 
    }
}


function atualizarListaRefeicoes() {
    const listaRefeicoes = document.getElementById('listaRefeicoes');
    listaRefeicoes.innerHTML = '';
    if (refeicoes.length === 0) {
        listaRefeicoes.innerHTML = '<li>Nenhuma refeição adicionada ainda.</li>';
    } else {
        refeicoes.forEach(refeicao => {
            const li = document.createElement('li');
            li.innerHTML = `<small>${refeicao.horario}</small> - ${refeicao.descricao}`;
            listaRefeicoes.appendChild(li);
        });
    }
}

let refeicoes = [];
const adicionarRefeicaoButton = document.getElementById('adicionarRefeicao');
if (adicionarRefeicaoButton) {
    adicionarRefeicaoButton.addEventListener('click', adicionarRefeicao);
}

carregarRefeicoes();

function salvarObjetivos() {
    localStorage.setItem('objetivos', JSON.stringify(objetivos));
}

function carregarObjetivos() {
    const objetivosString = localStorage.getItem('objetivos');
    if (objetivosString) {
        objetivos = JSON.parse(objetivosString);
        atualizarListaObjetivos();
    }
}

function adicionarObjetivo() {
    const descricaoInput = document.getElementById('descricaoObjetivoInput');
    let descricao = descricaoInput.value;

    // Capitalize a primeira letra da descrição
    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    if (descricao.trim() !== '') {
        const listaObjetivos = document.getElementById('listaObjetivos');
        const mensagemNenhumObjetivo = listaObjetivos.querySelector('p');

        if (mensagemNenhumObjetivo) {
            mensagemNenhumObjetivo.remove(); // Remove a mensagem se existir
        }

        const novoCheckbox = document.createElement('input');
        novoCheckbox.type = 'checkbox';
        novoCheckbox.className = 'form-check-input';

        const novaLabel = document.createElement('label');
        novaLabel.className = 'form-check-label';
        novaLabel.setAttribute('contentEditable', true); // Permite edição de conteúdo
        novaLabel.textContent = descricao;
        novaLabel.addEventListener('blur', function() {
            // Atualiza a descrição do objetivo quando a edição termina
            const descricaoAntiga = descricao;
            const novaDescricao = this.textContent.trim();
            atualizarDescricaoObjetivo(descricaoAntiga, novaDescricao);
        });

        const spanRemove = document.createElement('span');
        spanRemove.className = 'remove';
        const iconeRemover = document.createElement('img');
        iconeRemover.src = '../assets/images/icons/icRemoveWhite.svg'; // Aqui você coloca o caminho relativo da sua imagem de remover
        iconeRemover.alt = 'Remover';
        spanRemove.appendChild(iconeRemover);
        spanRemove.addEventListener('click', function() {
            this.parentNode.remove(); // Remove o item quando o span é clicado
            removerObjetivo(descricao);
        });

        const divFormCheck = document.createElement('div');
        divFormCheck.className = 'form-check';
        divFormCheck.appendChild(novoCheckbox);
        divFormCheck.appendChild(novaLabel);
        divFormCheck.appendChild(spanRemove);

        listaObjetivos.appendChild(divFormCheck);

        // Salvando o novo objetivo no localStorage
        const novoObjetivo = {
            descricao: descricao,
            concluido: false // Definindo como não concluído por padrão
        };
        objetivos.push(novoObjetivo);
        salvarObjetivos();
        
        $('#addObjetivo').modal('hide');
    }
}

document.getElementById('descricaoObjetivoInput').addEventListener('input', function() {
    let descricao = this.value;

    // Capitalize a primeira letra da descrição
    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    // Atualiza o valor do campo de descrição com a primeira letra maiúscula
    this.value = descricao;
});

function atualizarDescricaoObjetivo(descricaoAntiga, novaDescricao) {
    const indexObjetivo = objetivos.findIndex(objetivo => objetivo.descricao === descricaoAntiga);
    if (indexObjetivo !== -1) {
        objetivos[indexObjetivo].descricao = novaDescricao;
        salvarObjetivos(); // Salvando as alterações no localStorage após a edição
        atualizarListaObjetivos(); // Atualizando a lista de objetivos na interface após a edição
    }
}

function removerObjetivo(descricao) {
    objetivos = objetivos.filter(objetivo => objetivo.descricao !== descricao);
    salvarObjetivos();

    const listaObjetivos = document.getElementById('listaObjetivos');
    if (objetivos.length === 0) {
        const mensagemNenhumObjetivo = document.createElement('p');
        mensagemNenhumObjetivo.textContent = 'Nenhum objetivo adicionado ainda.';
        listaObjetivos.innerHTML = ''; // Limpa a lista de objetivos
        listaObjetivos.appendChild(mensagemNenhumObjetivo); // Adiciona a mensagem
    }
}

function atualizarListaObjetivos() {
    const listaObjetivos = document.getElementById('listaObjetivos');
    const mensagemNenhumObjetivo = document.createElement('p');
    mensagemNenhumObjetivo.textContent = 'Nenhum objetivo adicionado ainda.';
    
    if (objetivos.length === 0) {
        listaObjetivos.innerHTML = ''; // Limpa a lista de objetivos
        listaObjetivos.appendChild(mensagemNenhumObjetivo); // Adiciona a mensagem
    } else {
        listaObjetivos.innerHTML = ''; // Limpa a lista de objetivos
        objetivos.forEach(objetivo => {
            const novoCheckbox = document.createElement('input');
            novoCheckbox.type = 'checkbox';
            novoCheckbox.className = 'form-check-input';
            novoCheckbox.checked = objetivo.concluido;

            const novaLabel = document.createElement('label');
            novaLabel.className = 'form-check-label';
            novaLabel.setAttribute('contentEditable', true); // Permite edição de conteúdo
            novaLabel.textContent = objetivo.descricao;

            const spanRemove = document.createElement('span');
            spanRemove.className = 'remove';
            const iconeRemover = document.createElement('img');
            iconeRemover.src = '../assets/images/icons/icRemoveWhite.svg'; // Aqui você coloca o caminho relativo da sua imagem de remover
            iconeRemover.alt = 'Remover';
            spanRemove.appendChild(iconeRemover);
            spanRemove.addEventListener('click', function() {
                this.parentNode.remove(); // Remove o item quando o span é clicado
                removerObjetivo(objetivo.descricao);
            });

            const divFormCheck = document.createElement('div');
            divFormCheck.className = 'form-check';
            divFormCheck.appendChild(novoCheckbox);
            divFormCheck.appendChild(novaLabel);
            divFormCheck.appendChild(spanRemove);

            listaObjetivos.appendChild(divFormCheck);

            // Adicionando evento para marcar como concluído
            novoCheckbox.addEventListener('change', function() {
                objetivo.concluido = this.checked;
                salvarObjetivos();
            });
        });
    }
}

let objetivos = [];

document.getElementById('descricaoObjetivoInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        adicionarObjetivo();
    }
});

document.getElementById('adicionarObjetivo').addEventListener('click', adicionarObjetivo);
carregarObjetivos();

function salvarTarefas() {
    localStorage.setItem('tarefas', JSON.stringify(tarefas));
}


function carregarTarefas() {
    const tarefasString = localStorage.getItem('tarefas');
    if (tarefasString) {
        tarefas = JSON.parse(tarefasString);
        atualizarListaTarefas();
    }
}

function adicionarTarefa() {
    const descricaoInput = document.getElementById('descricaoTarefasInput');
    let descricao = descricaoInput.value;

    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    if (descricao.trim() !== '') {
        const listaTarefas = document.getElementById('listaTarefas');
        const mensagemNenhumaTarefa = listaTarefas.querySelector('p');

        if (mensagemNenhumaTarefa) {
            mensagemNenhumaTarefa.remove(); 
        }

        const novoCheckbox = document.createElement('input');
        novoCheckbox.type = 'checkbox';
        novoCheckbox.className = 'form-check-input';

        const novaLabel = document.createElement('label');
        novaLabel.className = 'form-check-label';
        novaLabel.setAttribute('contentEditable', true); 
        novaLabel.textContent = descricao;

        novaLabel.addEventListener('input', function() {
            const novaDescricao = this.textContent.trim();
            const indexTarefa = Array.from(this.parentNode.parentNode.children).indexOf(this.parentNode); 
            if (indexTarefa !== -1) {
                tarefas[indexTarefa].descricao = novaDescricao;
                salvarTarefas(); 
            }
        });

        novoCheckbox.addEventListener('change', function() {
            const indexTarefa = Array.from(this.parentNode.parentNode.children).indexOf(this.parentNode); 
            if (indexTarefa !== -1) {
                tarefas[indexTarefa].concluida = this.checked; 
                salvarTarefas(); 
            }
        });

        const spanRemove = document.createElement('span');
        spanRemove.className = 'remove';
        const iconeRemover = document.createElement('img');
        iconeRemover.src = '../assets/images/icons/icRemoveWhite.svg';
        iconeRemover.alt = 'Remover';
        spanRemove.appendChild(iconeRemover);

        spanRemove.addEventListener('click', function() {
            const descricaoTarefa = this.parentNode.querySelector('.form-check-label').textContent;
            this.parentNode.remove(); 
            removerTarefa(descricaoTarefa); 
        });

        const divFormCheck = document.createElement('div');
        divFormCheck.className = 'form-check';
        divFormCheck.appendChild(novoCheckbox);
        divFormCheck.appendChild(novaLabel);
        divFormCheck.appendChild(spanRemove);

        listaTarefas.appendChild(divFormCheck);

        const novaTarefa = {
            descricao: descricao,
            concluida: false 
        };
        tarefas.push(novaTarefa);
        salvarTarefas();

        descricaoInput.value = '';
        $('#addTarefaFlow').modal('hide');
    }
}

document.getElementById('descricaoTarefasInput').addEventListener('input', function() {
    let descricao = this.value;

    descricao = descricao.charAt(0).toUpperCase() + descricao.slice(1);

    this.value = descricao;
});

function atualizarDescricaoTarefa(descricaoAntiga, novaDescricao) {
    const indexTarefa = tarefas.findIndex(tarefa => tarefa.descricao === descricaoAntiga);
    if (indexTarefa !== -1) {
        tarefas[indexTarefa].descricao = novaDescricao;
        salvarTarefas(); 
    }
}


function removerTarefa(descricao) {
    const indexTarefa = tarefas.findIndex(tarefa => tarefa.descricao === descricao);
    if (indexTarefa !== -1) {
        tarefas.splice(indexTarefa, 1);
        salvarTarefas();

        const listaTarefas = document.getElementById('listaTarefas');
        if (tarefas.length === 0) {
            const mensagemNenhumaTarefa = document.createElement('p');
            mensagemNenhumaTarefa.textContent = 'Nenhuma tarefa adicionada ainda.';
            listaTarefas.innerHTML = ''; 
            listaTarefas.appendChild(mensagemNenhumaTarefa); 
        }
    }
}

function salvarTarefas() {
    localStorage.setItem('tarefas', JSON.stringify(tarefas));
}

function carregarTarefas() {
    const tarefasString = localStorage.getItem('tarefas');
    if (tarefasString) {
        tarefas = JSON.parse(tarefasString);
        atualizarListaTarefas(); 
    }
}

function atualizarListaTarefas() {
    const listaTarefas = document.getElementById('listaTarefas');
    const mensagemNenhumaTarefa = document.createElement('p');
    mensagemNenhumaTarefa.textContent = 'Nenhuma tarefa adicionada ainda.';
    
    if (tarefas.length === 0) {
        listaTarefas.innerHTML = ''; 
        listaTarefas.appendChild(mensagemNenhumaTarefa); 
    } else {
        listaTarefas.innerHTML = '';
        tarefas.forEach(tarefa => {
            const novoCheckbox = document.createElement('input');
            novoCheckbox.type = 'checkbox';
            novoCheckbox.className = 'form-check-input';
            novoCheckbox.checked = tarefa.concluida;

            const novaLabel = document.createElement('label');
            novaLabel.className = 'form-check-label';
            novaLabel.setAttribute('contentEditable', true); 
            novaLabel.textContent = tarefa.descricao;

            const spanRemove = document.createElement('span');
            spanRemove.className = 'remove';
            const iconeRemover = document.createElement('img');
            iconeRemover.src = '../assets/images/icons/icRemoveWhite.svg'; 
            iconeRemover.alt = 'Remover';
            spanRemove.appendChild(iconeRemover);
            spanRemove.addEventListener('click', function() {
                this.parentNode.remove(); 
                removerTarefa(tarefa.descricao);
            });

            const divFormCheck = document.createElement('div');
            divFormCheck.className = 'form-check';
            divFormCheck.appendChild(novoCheckbox);
            divFormCheck.appendChild(novaLabel);
            divFormCheck.appendChild(spanRemove);

            listaTarefas.appendChild(divFormCheck);

            novoCheckbox.addEventListener('change', function() {
                tarefa.concluida = this.checked;
                salvarTarefas();
            });
        });
    }
}
let tarefas = [];

document.getElementById('descricaoTarefasInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        adicionarTarefa();
    }
});

document.getElementById('adicionarTarefa').addEventListener('click', adicionarTarefa);
carregarTarefas();


const adicionarObjetivoButton = document.getElementById('adicionarObjetivo');
if (adicionarObjetivoButton) {
    adicionarObjetivoButton.addEventListener('click', adicionarObjetivoDia);
}


// Array com as frases
var phrases = [
    "Não pergunte o que o mundo precisa. Pergunte o que faz você se sentir vivo. - Howard Thurman",
    "A qualidade de sua vida é determinada pela qualidade de seus pensamentos. - Marco Aurélio",
    "Não é o que acontece com você, mas como você reage, que importa. - Epicteto",
    "A vida é muito curta para ser pequena. - Benjamin Disraeli",
    "A felicidade e a liberdade começam com a compreensão clara de um princípio: algumas coisas estão sob nosso controle, e outras não. - Epicteto",
    "Você tem poder sobre sua mente, não sobre os eventos externos. Perceba isso, e você encontrará força. - Marco Aurélio",
    "Não é porque as coisas são difíceis que não ousamos; é porque não ousamos que são difíceis. - Sêneca",
    "Apressar-se é inútil porque tudo tem seu tempo. - Sêneca",
    "A arte de viver é mais parecida com a luta do que com a dança. - Marco Aurélio",
    "Comece agora a ser o que você será daqui para frente. - Santo Agostinho",
    "A felicidade não é ter o que você quer, mas querer o que você tem. - Epicteto",
    "A dificuldade é uma desculpa que a história nunca aceita. - Edward R. Murrow",
    "A excelência é uma arte conquistada pelo treinamento e habituação. - Aristóteles",
    "A vida, se bem vivida, é longa o suficiente. - Sêneca",
    "A única maneira de fazer um excelente trabalho é amar o que você faz. - Steve Jobs",
    "A persistência é o veículo do êxito. - Sêneca",
    "A sabedoria consiste em fazer a próxima coisa que você tem que fazer, fazendo bem o que você está fazendo agora. - Sêneca",
    "A verdadeira felicidade é desfrutar o presente, sem ansiedade dependente do futuro. - Sêneca",
    "A vida é o que nossos pensamentos fazem dela. - Marco Aurélio",
    "A mente que está ansiosa pelo futuro é infeliz. - Sêneca",
    "Somente o educado é livre. - Epicteto",
    "Perda não é nada mais do que mudança, e mudança é o prazer da alma. - Marco Aurélio",
    "A coragem não é simplesmente uma das virtudes, mas a forma de todas as virtudes no ponto de teste. - C.S. Lewis",
    "A melhor vingança é ser diferente daquele que causou o dano. - Marco Aurélio",
    "Não se conquista a fama deitado sobre plumas. - Sêneca",
    "A vida é uma viagem, não um destino. - Ralph Waldo Emerson",
    "Aquele que tem um porquê para viver pode suportar quase qualquer como. - Friedrich Nietzsche",
    "A alegria de ver e entender é o mais perfeito dom da natureza. - Albert Einstein",
    "A grandeza se revela não pela posse de honrarias, mas pela virtude. - Sêneca",
    "Não é o homem que tem pouco, mas o homem que deseja mais, que é pobre. - Sêneca",
    "A sabedoria é a coisa principal; portanto, adquira sabedoria. E com tudo o que adquirir, adquira entendimento. - Provérbios 4:7",
    "A ignorância é a causa do medo. - Sêneca",
    "A vida sem reflexão não vale a pena ser vivida. - Sócrates",
    "A mente é como um paraquedas. Só funciona se estiver aberta. - Frank Zappa",
    "A verdadeira sabedoria vem de saber que você não sabe. - Sócrates",
    "A liberdade é o direito de dizer às pessoas o que elas não querem ouvir. - George Orwell",
    "A simplicidade é a última sofisticação. - Leonardo da Vinci",
    "A vida é feita de escolhas, e no final, nossas escolhas nos fazem. - John Green",
    "A paciência é amarga, mas seu fruto é doce. - Aristóteles",
    "A felicidade depende de nós mesmos. - Aristóteles",
    "Apenas o sábio obtém o que ele deseja. - Zenão de Cítio",
    "A virtude é suficiente para a felicidade. - Epicuro",
    "A riqueza consiste muito mais em desfrutar do que em possuir. - Aristóteles",
    "Para sermos felizes, devemos não nos preocupar com coisas que ultrapassam o poder da nossa vontade. - Epicteto",
    "O homem sábio não se aflige pelo que não tem, mas se alegra com o que tem. - Epicteto",
    "A vida feliz e tranquila consiste em estar livre de todas as preocupações mentais. - Epicuro",
    "A medida do amor é amar sem medida. - Santo Agostinho",
    "A verdadeira medida de um homem não é como ele se comporta em momentos de conforto e conveniência, mas como ele se mantém em tempos de controvérsia e desafio. - Martin Luther King Jr.",
    "Não é a força, mas a persistência, que completa uma jornada. - Samuel Johnson",
    "A sabedoria é a recompensa por uma vida de escuta quando você preferiria ter falado. - Mark Twain",
    "A vida é uma série de escolhas naturais e espontâneas que levam a uma felicidade sublime. - Lao Tsé",
    "Aquele que tem um porquê para viver pode enfrentar todos os 'comos'. - Viktor Frankl",
    "A felicidade não é algo pronto. Vem de suas próprias ações. - Dalai Lama",
    "A mente que se abre a uma nova ideia jamais voltará ao seu tamanho original. - Albert Einstein",
    "A verdadeira generosidade para com o futuro consiste em dar tudo ao presente. - Albert Camus",
    "A maior glória não é nunca cair, mas sim levantar-se sempre. - Nelson Mandela",
    "A vida é 10% o que acontece comigo e 90% de como eu reajo a isso. - Charles R. Swindoll",
    "Aquele que conquista a si mesmo é o maior dos conquistadores. - Platão",
    "A arte de ser sábio é a arte de saber o que ignorar. - William James",
    "A felicidade é a ausência do esforço para a felicidade. - Chuang Tzu",
    "Aquele que aprende a viver bem aprenderá a morrer bem. - Sócrates",
    "A vida é uma tragédia quando vista de perto, mas uma comédia à distância. - Charlie Chaplin",
    "A coragem é a primeira das qualidades humanas porque é a qualidade que garante as demais. - Winston Churchill",
    "A vida é como andar de bicicleta. Para manter o equilíbrio, você deve continuar se movendo. - Albert Einstein",
    "Aquele que não tem um objetivo claro, raramente sente a alegria do sucesso. - Paul J. Meyer",
    "A felicidade é quando o que você pensa, o que você diz e o que você faz estão em harmonia. - Mahatma Gandhi",
    "A maior descoberta de todos os tempos é que uma pessoa pode mudar seu futuro apenas mudando sua atitude. - Oprah Winfrey",
    "A vida é feita de desafios que, se aproveitados de forma criativa, transformam-se em oportunidades. - Maxwell Maltz",
    "Aquele que não tem coragem de arriscar não conquistará nada na vida. - Muhammad Ali",
    "A simplicidade é o último grau de sofisticação. - Leonardo da Vinci",
    "A vida é uma aventura ousada ou nada. - Helen Keller",
    "Aquele que se perde em sua paixão é menos perdido do que aquele que perde sua paixão. - Saint Augustine",
    "A vida não é esperar a tempestade passar, é aprender a dançar na chuva. - Vivian Greene",
    "Aquele que move montanhas começa carregando pequenas pedras. - Confúcio",
    "A vida é uma arte de desenhar sem borracha. - John W. Gardner",
    "Aquele que faz uma pergunta é tolo por cinco minutos; aquele que não faz pergunta permanece tolo para sempre. - Provérbio Chinês",
    "A vida é o que acontece enquanto você está ocupado fazendo outros planos. - John Lennon",
    "Aquele que sabe ser contente será sempre feliz. - Confúcio",
    "Aquele que não avança todos os dias, retrocede todos os dias. - Confúcio",
    "A excelência não é um feito, mas um hábito. - Aristóteles",
    "A vida é uma eco; o que você envia, volta. - Chinês Proverb",
    "A mente é tudo. Você se torna o que você pensa. - Buda",
    "A vida encolhe ou se expande proporcionalmente à coragem de alguém. - Anaïs Nin",
    "Aquele que supera os outros é forte, mas aquele que supera a si mesmo é poderoso. - Lao Tzu",
    "A vida não é sobre encontrar a si mesmo. A vida é sobre criar a si mesmo. - George Bernard Shaw",
    "Aquele que não espera por gratidões nunca será desapontado. - Provérbio Italiano",
    "A vida é uma série de experiências, cada uma das quais nos torna maiores. - Henry Ford",
    "Aquele que controla os outros pode ser poderoso, mas aquele que dominou a si mesmo é ainda mais poderoso. - Lao Tzu",
    "A vida é curta, e é aqui para ser vivida. - Kate Winslet",
    "Aquele que pergunta é um tolo por cinco minutos, mas aquele que não pergunta permanece um tolo para sempre. - Provérbio Chinês",
    "A vida é uma viagem que deve ser viajada, não importa quão ruins sejam as estradas e as acomodações. - Oliver Goldsmith",
    "Aquele que deseja mudar o mundo deve primeiro mudar a si mesmo. - Sócrates",
    "A vida é feita de escolhas. Em cada escolha, uma renúncia. - Desconhecido",
    "Aquele que conhece os outros é sábio. Aquele que conhece a si mesmo é iluminado. - Lao Tzu",
    "A vida é um reflexo do que estamos dispostos a tolerar. - Desconhecido",
    "Aquele que faz o bem conquista a si mesmo; aquele que faz o mal está perdido. - Provérbio Tibetano",
    "A vida é como andar de bicicleta. Para manter o equilíbrio, você deve se manter em movimento. - Albert Einstein",
    "Aquele que semeia virtude colhe honra. - Leonardo da Vinci",
    "A vida é uma arte de tirar conclusões suficientes a partir de premissas insuficientes. - Samuel Butler",
    "Aquele que é mestre de si mesmo é maior do que aquele que é mestre do mundo. - Buda",
];

// Função para escolher uma frase aleatória e atualizar o elemento <p>
function updatePhrase() {
    var randomIndex = Math.floor(Math.random() * phrases.length);
    var phrase = phrases[randomIndex];
    document.getElementById("dynamicPhrase").innerText = phrase;
}

// Atualiza a frase quando a página é carregada
window.addEventListener("load", updatePhrase);

// Também atualiza a frase quando o botão "Perfil caverna" é clicado
document.querySelector(".perfil").addEventListener("click", updatePhrase);
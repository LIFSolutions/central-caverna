<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modo Caverna | Desafio</title>
    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- GLOBAL CSS -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="wrapper">
            <div class="heading">
                <div class="container">
                    <div class="logo">
                        <a href="./"><img src="../assets/images/logo.svg"></a>
                    </div>
                    <div class="menu">
                    <?php include_once '../includes/menu.php'; ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="defaultPage2">
                    <div class="conteudoPage">
                        <h1>Treino e Alimentação</h1>
                        
                        <div class="treinos">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-treinos-tab" data-bs-toggle="tab" data-bs-target="#nav-treinos" type="button" role="tab" aria-controls="nav-treinos" aria-selected="true">Treinos</button>
                                    <button class="nav-link" id="nav-ficha-tab" data-bs-toggle="tab" data-bs-target="#nav-ficha" type="button" role="tab" aria-controls="nav-ficha" aria-selected="false">Ficha de Treino</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-treinos" role="tabpanel" aria-labelledby="nav-treinos-tab" tabindex="0">
                                <?php include_once '../includes/treinos.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="nav-ficha" role="tabpanel" aria-labelledby="nav-ficha-tab" tabindex="0">
                                <div class="ficha">
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COMPRAS -->
                        <h3>Dieta e Suplementação</h3>
                        <div class="dieta mb-5">
                            <div id="dieta">
                                <div class="title">
                                    <img src="../assets/images/icons/icCheckList.svg">
                                    <span>Refeições</span>
                                </div>
                                <p id="mensagemRefeicoes">Não existem refeições cadastradas ainda, clique em novo para registrar uma nova refeição</p> <!-- Mensagem padrão -->

                                <div class="add">
                                    <div class="info" onclick="adicionarBloco();">
                                        <img src="../assets/images/icons/icAdd.svg">
                                        <span>Novo</span>
                                    </div>
                                </div>
                            </div>

                            <div id="listaCompras">
                                <div class="title">
                                    <img src="../assets/images/icons/icCheckList.svg">
                                    <span>Lista de Compras</span>
                                </div>
                                
                                <p id="mensagemLista">Não existe lista de compra cadastrada, clique em novo para registrar</p>

                                <div class="add">
                                    <div class="info" onclick="adicionarItemListaCompras();">
                                        <img src="../assets/images/icons/icAdd.svg">
                                        <span>Novo</span>
                                    </div>
                                </div>
                            </div>

                            <div id="suplementos">
                                <div class="title">
                                    <img src="../assets/images/icons/icCheckList.svg">
                                    <span>Suplementos</span>
                                </div>

                                <p id="mensagemSuplementos">Não existe nenhum suplemento cadastrado, clique em novo para registrar</p>

                                <div class="add">
                                    <div class="info" onclick="adicionarSuplemento();">
                                        <img src="../assets/images/icons/icAdd.svg">
                                        <span>Novo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../includes/footer.php'; ?>
    
    <!-- MODALS -->
    <div class="globalModals">
        <?php include_once '../modals/desafio.php'; ?>
        <?php include_once '../modals/addExercicio.php'; ?>
        <?php include_once '../modals/addTreino.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/functionsTreinos.js"></script>
    <script>
        function abrirModalAdicionar() {
            $('#modalAdicionarExercicio').modal('show');
        }

        function adicionarExercicio() {
            var titulo = document.querySelector('#addFichaTreino input[name="titulo"]').value;
            var series = document.querySelector('#addFichaTreino input[name="series"]').value;
            var repeticoes = document.querySelector('#addFichaTreino input[name="repeticoes"]').value;
            var carga = document.querySelector('#addFichaTreino input[name="carga"]').value;

            if (titulo.trim() !== "" && series.trim() !== "" && repeticoes.trim() !== "" && carga.trim() !== "") {
                var treino = {
                    titulo: titulo,
                    series: series,
                    repeticoes: repeticoes,
                    carga: carga
                };

                var treinos = JSON.parse(localStorage.getItem('treinos')) || [];

                treinos.push(treino);

                localStorage.setItem('treinos', JSON.stringify(treinos));

                document.querySelector('#addFichaTreino input[name="titulo"]').value = "";
                document.querySelector('#addFichaTreino input[name="series"]').value = "";
                document.querySelector('#addFichaTreino input[name="repeticoes"]').value = "";
                document.querySelector('#addFichaTreino input[name="carga"]').value = "";

                exibirTreinosArmazenados();
                $('#addFichaTreino').modal('hide');
            } else {
                alert('Por favor, preencha todos os campos.');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            function exibirTreinosArmazenados() {
                var treinos = JSON.parse(localStorage.getItem('treinos'));
                var fichaDiv = document.querySelector('.ficha');
                fichaDiv.innerHTML = "";

                if (treinos && treinos.length > 0) {
                    treinos.forEach(function(treino) {
                        var treinoDiv = criarTreinoDiv(treino);
                        fichaDiv.appendChild(treinoDiv);
                    });
                }

                adicionarTreinoVazio(fichaDiv);
            }

            function criarTreinoDiv(treino) {
                var treinoDiv = document.createElement('div');
                treinoDiv.classList.add('card');

                treinoDiv.innerHTML = `
                    <h3 contentEditable="true">${treino.titulo}</h3>
                    <div class="infoTreino">
                        <small>Series</small>
                        <p contentEditable="true">${treino.series}</p>
                        <small>Repetições</small>
                        <p contentEditable="true">${treino.repeticoes}</p>
                        <small>Carga</small>
                        <p contentEditable="true">${treino.carga}</p>
                        <img src="../assets/images/icons/icRemove.svg" class="remove-icon">
                    </div>
                `;

                return treinoDiv;
            }

            function adicionarTreinoVazio(container) {
                var emptyDiv = document.createElement('div');
                emptyDiv.classList.add('card', 'empty');
                emptyDiv.innerHTML = `
                    <div data-bs-toggle="modal" data-bs-target="#addFichaTreino">
                        <span>Adicionar</span>
                    </div>
                `;
                container.appendChild(emptyDiv);
            }

            function atualizarTreinoLocalStorage() {
                var treinos = [];

                var treinoDivs = document.querySelectorAll('.ficha .card:not(.empty)');
                treinoDivs.forEach(function(treinoDiv) {
                    var titulo = treinoDiv.querySelector('h3').textContent;
                    var series = treinoDiv.querySelector('p:nth-of-type(1)').textContent;
                    var repeticoes = treinoDiv.querySelector('p:nth-of-type(2)').textContent;
                    var carga = treinoDiv.querySelector('p:nth-of-type(3)').textContent;

                    var treino = {
                        titulo: titulo,
                        series: series,
                        repeticoes: repeticoes,
                        carga: carga
                    };

                    treinos.push(treino);
                });

                localStorage.setItem('treinos', JSON.stringify(treinos));
            }
            23
            window.onload = exibirTreinosArmazenados;
            exibirTreinosArmazenados();

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-icon')) {
                    var treinoDiv = event.target.closest('.card');
                    treinoDiv.remove();

                    atualizarTreinoLocalStorage();
                }
            });

            // Adicione um evento de input para atualizar o localStorage quando um treino é editado
            document.addEventListener('input', function(event) {
                if (event.target.matches('[contenteditable=true]')) {
                    atualizarTreinoLocalStorage();
                }
            });
        });

    </script>
</body>
</html>
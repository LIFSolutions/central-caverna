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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojimart/3.0.2/emojimart.css" />
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
                <div class="desafio">
                    <div class="top">
                        <div>
                            <button data-bs-toggle="modal" data-bs-target="#modalDesafio" class="buttonDesafio"><img src="../assets/images/icons/icDesafio.svg"> Criar desafio Caverna</button>
                            <button class="buttonActive" style="display:none;"><img src="../assets/images/icons/icDesafio.svg"> Desafio Express Ativado</button>
                        </div>
                        <div>
                            <p>Como funciona o Desafio? <span>Clique no botão ao lado para saber mais sobre o Desafio Caverna</span></p>
                            <button data-bs-toggle="modal" data-bs-target="#modalVideo">Ver tutorial</button>
                        </div>
                    </div>

                    <div class="content">
                        <div>
                            <div class="meComprometo filter">
                                <span>Me comprometo a abdicar de:</span>
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                            <div class="naoFalhar filter">
                                <span>Não posso falhar:</span>
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                        </div>

                        <div>
                            <div class="desafioBox filter">
                                <div class="title">
                                    <div>
                                        <span>Desafio Express</span>
                                        <p id="inicioDesafio">Inicio: 00/00/2024 - Finaliza em: 00/00/2024</p>
                                    </div>

                                    <div>
                                        <span>Meta</span>
                                        <div class="progressInfo">
                                            <span class="metaDesafio">25</span>
                                            <div class="progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 0%"></div>
                                            </div>
                                            <div class="progressFinal"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="days">
                                    <?php
                                    for ($i = 0; $i < 60; $i++) {
                                        if ($i < 30) {
                                            echo '<div id="day' . $i . '"><span>0</span></div>';
                                        } else {
                                            echo '<div id="day' . $i . '" class="disabled"><span>0</span></div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="diaHoje filter">
                                <div class="form">
                                    <span>Como foi seu dia hoje?</span>
                                    <h1 id="dateNow"></h1>
                                    <hr>
                                    <div class="buttons">
                                        <button id="positiveButton" class="positive">Marcar como positivo</button>
                                        <button id="negativeButton" class="negative">Marcar como negativo</button>
                                    </div>
                                    <div class="send">
                                        <textarea name="" id="" class="form-control" placeholder="Gostaria de registrar o motivo da sua avaliação? (Opcional)"></textarea>
                                        <button id="submitButton">Enviar</button>
                                    </div>
                                    <div class="messageInfo" style="display:none;">
                                        <p class="positiveMessage">Parabéns, você venceu mais um! <br>Restam <b>29 dias</b> para completar o desafio.</p>
                                        <p class="negativeMessage" style="display:none;">Parece que você vacilou hoje... <br>Não se torture. Amanhã é um novo dia! 🔺🐺</p>
                                    </div>
                                </div>

                                <div class="activeDay" style="display:none;">
                                    <span>Sua avaliação de hoje ficará disponível em:</span>
                                    <div class="hourTilt">
                                        <img src="../assets/images/icons/icHour.svg">
                                        <h3></h3>
                                    </div>
                                    <small>Depois que sua avaliação estiver disponível, você terá <br>até às 23:59 para fazer o registro do seu dia.</small>
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
        <?php include_once '../modals/tutorial.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/functionsDesafio.js"></script>
    <script src="../assets/js/vanillaEmojiPicker.js"></script>
    <script>
        new EmojiPicker({
            trigger: [
                {
                    selector: '#emojiPickerBtn',
                    insertInto: ['#inputAbdicar', '#inputFalhar']
                },
            ],
            closeButton: true,
        });

    </script>
    <script>
        $('#modalDesafio').on('hidden.bs.modal', function () {
            // Recuperando os itens salvos no localStorage
            const itensAbdicar = JSON.parse(localStorage.getItem("itensAdicionadosAbdicar")) || [];
            const itensFalhar = JSON.parse(localStorage.getItem("itensAdicionadosFalhar")) || [];

            // Selecionando as listas onde os itens serão exibidos
            const listaAbdicar = document.querySelector(".meComprometo ul");
            const listaFalhar = document.querySelector(".naoFalhar ul");

            // Função para adicionar os itens às listas HTML
            function adicionarItensLista(itens, lista) {
                lista.innerHTML = ""; // Limpa a lista para evitar duplicatas

                itens.forEach((item) => {
                    const li = document.createElement("li");
                    li.textContent = item;
                    lista.appendChild(li);
                });
            }

            // Adicionando os itens às listas correspondentes
            adicionarItensLista(itensAbdicar, listaAbdicar);
            adicionarItensLista(itensFalhar, listaFalhar);
        });
    </script>
</body>
</html>
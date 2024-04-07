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
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet" />
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
                <div class="defaultPage2 mb-5">
                    <div class="conteudoPage">
                        <div class="anotacoes">
                            <div class="folders" id="step1">
                                <div class="headNota mb-5">
                                    <h1>Anotações</h1>
                                    <button id="btnNovaAnotacao" class="btn btn-primary">Nova anotação</button>
                                </div>
                                <div class="main">
                                    <div>
                                        <img src="../assets/images/icons/icFolder.svg">
                                        <h3 contentEditable="true">Lista de Desejos (4)</h3>
                                    </div>

                                    <div>
                                        <img src="../assets/images/icons/icArrow.svg">
                                    </div>
                                </div>

                                <div class="main">
                                    <div>
                                        <img src="../assets/images/icons/icFolder.svg">
                                        <h3>Lista de Necessidades (0)</h3>
                                    </div>

                                    <div>
                                        <img src="../assets/images/icons/icArrow.svg">
                                    </div>
                                </div>

                                <div class="main">
                                    <div>
                                        <img src="../assets/images/icons/icFolder.svg">
                                        <h3>Pensamentos (0)</h3>
                                    </div>

                                    <div>
                                        <img src="../assets/images/icons/icArrow.svg">
                                    </div>
                                </div>

                                <div class="main">
                                    <div>
                                        <img src="../assets/images/icons/icFolder.svg">
                                        <h3>Pessoal (0)</h3>
                                    </div>

                                    <div>
                                        <img src="../assets/images/icons/icArrow.svg">
                                    </div>
                                </div>

                                <div class="main">
                                    <div>
                                        <img src="../assets/images/icons/icFolder.svg">
                                        <h3>Projetos (0)</h3>
                                    </div>

                                    <div>
                                        <img src="../assets/images/icons/icArrow.svg">
                                    </div>
                                </div>
                            </div>

                            <div class="contentNotes" style="display:none;" id="step2">
                                <div class="headNota mb-5">
                                    <h1>Não esquecer</h1>
                                    <button id="btnNovaAnotacao" class="btn btn-primary">Nova anotação</button>
                                </div>

                                <div class="contentNoteInfo">
                                    <small class="titulo">Titulo da Nota</small>
                                    <small class="date">22/05/2024</small>
                                </div>

                                <div class="contentNoteInfo">
                                    <small class="titulo">Titulo da Nota</small>
                                    <small class="date">22/05/2024</small>
                                </div>

                                <div class="contentNoteInfo">
                                    <small class="titulo">Titulo da Nota</small>
                                    <small class="date">22/05/2024</small>
                                </div>

                                <div class="contentNoteInfo">
                                    <small class="titulo">Titulo da Nota</small>
                                    <small class="date">22/05/2024</small>
                                </div>
                            </div>

                            <div class="contentNoteMessage" style="display:none;" id="step3">
                                <h3 contenteditable="true">Titulo da nota</h3>
                                <small>23/04/2024</small>
                                <textarea class="form-control" placeholder="Escreva sua nota..."></textarea>
                                <button>Salvar nota</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once '../includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
    // Quando um elemento com a classe .main dentro de #step1 é clicado
    $('#step1 .main').click(function() {
        // Escondendo a div com o ID step1
        $('#step1').hide();
        // Exibindo a div com o ID step2
        $('#step2').show();
    });

    // Quando um elemento com a classe .contentNoteInfo dentro de #step2 é clicado
    $('#step2 .contentNoteInfo').click(function() {
        // Escondendo a div com o ID step2
        $('#step2').hide();
        // Exibindo a div com o ID step3
        $('#step3').show();
    });

    // Quando o botão "Salvar nota" dentro de #step3 é clicado
    $('#step3 button').click(function() {
        // Escondendo a div com o ID step3
        $('#step3').hide();
        // Exibindo a div com o ID step1
        $('#step1').show();
    });
});
    </script>
</body>
</html>
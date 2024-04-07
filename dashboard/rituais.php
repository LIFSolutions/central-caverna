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
                        <h1>Rituais</h1>
                        
                        <div class="ritual mb-5">
                            <div>
                                <span class="mt-0">☀️ Ritual Matinal <button class="btnAddBlocoMatinal" style="display:block;" data-bs-toggle="modal" data-bs-target="#modalRitualMatinal">Criar bloco</button></span>
                                <!-- <div class="createBlockMatinal" data-bs-toggle="modal" data-bs-target="#modalRitualMatinal">
                                    <span class="mt-0">Criar bloco</span>
                                </div> -->

                                <div class="ritualBlockAddMatinal">
                                    <span>⏰ 06:00 às 08:00</span>
                                    <ul class="sortable-list">
                                        <li contenteditable="true">Acordar → Água → Banho Gelado → Silêncio</li>
                                        <li contenteditable="true">Exercício Físico (Treino 01 - Verificar)</li>
                                        <li contenteditable="true">Imersão Piscina</li>
                                        <li contenteditable="true">Tempo com os Dogs</li>
                                    </ul>
                                </div>

                                <div class="ritualBlockAddMatinal">
                                    <span>⏰ 08:00 às 08:40</span>
                                    <ul class="sortable-list">
                                        <li>Banho</li>
                                        <li>Leitura</li>
                                        <li>Devocional</li>
                                        <li>Café da Manhã → Redes Sociais</li>
                                        <li>Cuidados Pessoais</li>
                                        <li>Suplementação → Água e Whey [Caverna]</li>
                                    </ul>
                                </div>

                                <div class="ritualBlockAddMatinal">
                                    <span>⏰ 09:00</span>
                                    <ul class="sortable-list">
                                        <li>Ativar o Flow Caverna</li>
                                    </ul>
                                </div>

                                <div class="metasRitual">
                                    <span>🎯 Metas do Ritual Matinal</span>
                                    <ul>
                                        <li contenteditable="true">Beber 1 litro de água</li>
                                        <li contenteditable="true">Aumentar a energia para ativar o Flow</li>
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <span class="mt-0">🌙 Ritual Noturno <button class="btnAddBlocoNoturno" style="display:block;" data-bs-toggle="modal" data-bs-target="#modalRitualNoturno">Criar bloco</button></span>
                                <!-- <div class="createBlockNoturno" data-bs-toggle="modal" data-bs-target="#modalRitualNoturno">
                                    <span class="mt-0">Criar bloco</span>
                                </div> -->
                                <div class="ritualBlockAddMatinal">
                                    <span>⏰ 22:30 às 23:00</span>
                                    <ul class="sortable-list">
                                        <li>Check na Central Caverna</li>
                                        <li>Preencher Desafio Modo Caverna</li>
                                        <li>Verificar Compromissos/Objetivos de amanhã</li>
                                        <li>Preparar Ritual Matinal</li>
                                        <li>Água ao lado da cama</li>
                                        <li>Roupa do treino (Caso faça)</li>
                                        <li>Banho Quente → Cuidados Pessoais </li>
                                        <li>Preparar Ambiente [Cortina aberta]</li>
                                    </ul>
                                </div>

                                <div class="ritualBlockAddMatinal">
                                    <span>⏰ 23:00</span>
                                    <ul class="sortable-list">
                                        <li>Leitura do Diário Estoico</li>
                                        <li>Oração → Dormir</li>
                                    </ul>
                                </div>

                                <div class="metasRitual">
                                    <span>🎯 Metas do Ritual Matinal</span>
                                    <ul>
                                        <li contenteditable="true">Dormir com clareza do amanhã</li>
                                        <li contenteditable="true">Dormir com a tranquilidade de que fiz tudo o que podia ter feito</li>
                                    </ul>
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
        <?php include_once '../modals/ritualMatinal.php'; ?>
        <?php include_once '../modals/ritualNoturno.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="../assets/js/functionsRituais.js"></script>
    <script src="../assets/js/tilt.jquery.min.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
    <script>
        $(document).ready(function() {
            $(".sortable-list").sortable();
            $('.time').mask('00:00');

            $(".sortable-list li").on("click", function() {
                var $editable = $(this).attr("contenteditable", "true");
                var textNode = $editable[0].childNodes[0];
                var caret = textNode.textContent.length;
                var range = document.createRange();
                var sel = window.getSelection();
                range.setStart(textNode, caret);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
                $editable.focus();
            });

            $(".sortable-list li").on("input", function() {
                if ($(this).text().trim() === "") {
                    $(this).remove();
                }
            });
        });
    </script>
</body>
</html>
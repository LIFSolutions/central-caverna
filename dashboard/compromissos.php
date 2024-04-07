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
    <link href="../assets/css/customCalendar.css" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/locales/pt-br.js'></script>

   
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
                        <div class="compromissos">
                            <h1>Compromissos e Objetivos <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompromisso">Adicionar Compromisso</button></h1>
                            <div id="calendar" class="mb-5 mt-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <?php include_once '../includes/footer.php'; ?>
    <?php include_once '../modals/addCompromisso.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                eventDisplay: 'block', 
                selectable: true,
                
                dateClick: function(info) {
                    $('#objetivoModal').modal('show');
                }
            });
            calendar.render();
        });

        // Função para salvar o compromisso
        function salvarCompromisso() {
            var novoCompromisso = document.getElementById('novoCompromisso').value;
            // Aqui você pode adicionar o código para salvar o compromisso, como enviar para o servidor, por exemplo.
            // Por enquanto, vamos apenas exibir o compromisso no console
            console.log("Novo compromisso adicionado: " + novoCompromisso);
            $('#objetivoModal').modal('hide');
        }
    </script>
</body>
</html>
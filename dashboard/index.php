<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modo Caverna</title>
    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- GLOBAL CSS -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/animationLogo.css" rel="stylesheet">
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
            <div class="container mt-4">
                <!-- BANNERS -->
                <div class="banner mt-4">
                    <?php include_once '../includes/banners.php'; ?>
                </div>
                <!-- END -->

                <!-- USER -->
                <div class="user mt-4">
                    <div>
                        <img src="../assets/images/avatar.png" class="avatar">
                    </div>

                    <div>
                        <h5>Olá Iuri!</h5>
                        <p id="dynamicPhrase"></p>
                    </div>

                    <div>
                        <button class="ranking"><img src="../assets/images/icons/icTrophy.svg">Ranking e Premiações</button>
                        <a href="../dashboard/perfil.php"><button class="perfil">Perfil caverna</button></a>
                    </div>
                </div>
                <!-- END -->
                <!-- BOX -->
                <div class="box mt-4">
                    <?php include_once '../includes/cards.php'; ?>
                </div>
                <!-- END -->

                <!-- COMPONENTS -->
                <h4 class="mt-4">Resumo do seu dia</h4>
                <div class="components">
                    <?php include_once '../components/checklistSemanal.php'; ?>
                    <?php include_once '../components/naoEsquecer.php'; ?>
                    <?php include_once '../components/treinos.php'; ?>
                </div>

                <div class="components mb-5">
                    <?php include_once '../components/rotina.php'; ?>
                    <div class="item">
                        <?php include_once '../components/compromissos.php'; ?>
                        <?php include_once '../components/objetivoDia.php'; ?>
                    </div>
                    <?php include_once '../components/refeicoes.php'; ?>
                </div>
                <!-- END -->
            </div>
        </div>
    </div>
   <?php include_once '../includes/footer.php'; ?>
    <!-- MODALS -->
    <div class="globalModals">
        <?php include_once '../modals/onboard.php'; ?>
        <?php include_once '../modals/naoEsquecer.php'; ?>
        <?php include_once '../modals/treinos.php'; ?>
        <?php include_once '../modals/rotina.php'; ?>
        <?php include_once '../modals/compromissos.php'; ?>
        <?php include_once '../modals/refeicoes.php'; ?>
        <?php include_once '../modals/objetivo.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/functions.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
    <script>
       $(document).ready(function(){
            var shouldDisplayModal = localStorage.getItem('displayModal');

            if (shouldDisplayModal !== 'false') {
                $('#onboard').modal('show');

                localStorage.setItem('displayModal', 'false');
            }

            $('#acessarButton').click(function() {
                $('#onboard').modal('hide');
            });

            $('.time').mask('00:00');

            $('[data-tilt]').tilt({
                scale: 1.3, 
                maxTilt: 30, 
                perspective: 2000, 
                glare: true, 
                maxGlare: 0.5 
            });
        });
    </script>
</body>
</html>


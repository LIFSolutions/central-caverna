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
    <link href="../assets/css/pomodoro.css" rel="stylesheet">
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
                <div class="flow mb-5">
                    <div class="top">
                        <div>
                            <span>Flow Caverna</span>
                            <p class="removeMessage">Faça o Ritual de ativação do Flow Caverna para a  liberação das funcionalidades</p>
                            <div class="switch__container">
                                <input id="switch-flat" class="switch switch--flat" type="checkbox">
                                <label for="switch-flat"></label>
                                <span id="flowStatus"></span>
                            </div>

                            <div class="links filter" data-filter-class>
                                <div class="title">
                                    <img src="../assets/images/icons/icCheckList.svg">
                                    <span>Ferramentas Importantes <small>Indicações do Iuri</small></span>
                                    <img src="../assets/images/icons/icDownWhite.svg" class="arrow">
                                </div>

                                <div class="dropdownItens" style="display:none;">
                                    <ul>
                                        <a href="https://redirect.lifs.app/zappro" target="_blank"><li><img src="../assets/images/icons/zap.png"> ZAPPRO <span>Lorem Ipsum is simply dummy text of the printing</span></li></a>
                                        <a href="https://bit.ly/acessarvoxuy" target="_blank"><li><img src="../assets/images/icons/vox.png"> VOXUY <span>Lorem Ipsum is simply dummy text of the printing</span></li></a>
                                        <a href="https://bit.ly/acessaradminer" target="_blank"><li><img src="../assets/images/icons/adminer.png">ADMINER <span>Lorem Ipsum is simply dummy text of the printing</span></li></a>
                                        <a href="https://bit.ly/acessarvturb" target="_blank"><li><img src="../assets/images/icons/vturb.png">VTURB <span>Lorem Ipsum is simply dummy text of the printing</span></li></a>
                                        <a href="https://bit.ly/acessarturbocloud" target="_blank"><li><img src="../assets/images/icons/turbocloud.png">TURBOCLOUD <span>Lorem Ipsum is simply dummy text of the printing</span></li></a>
                                        <a href="https://bit.ly/acessarperfectpay" target="_blank"><li><img src="../assets/images/icons/perfect.png">PERFECTPAY <span>Lorem Ipsum is simply dummy text of the printing</span></li></a>
                                        <a href="https://www.facebook.com/ads/library" target="_blank"><li><img src="../assets/images/icons/facebook.png">META ADS LIBRARY <span>Lorem Ipsum is simply dummy text of the printing</span></li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="filter customHeight" data-filter-class>
                            <span>É tudo por vocês!</span>
                            <div class="boxImage mt5" onclick="uploadTudoPorVoces(this)">
                                <img src="../assets/images/icons/icImage.svg">
                                <small>Adicionar</small>
                            </div>
                        </div>
                        <div class="filter" data-filter-class>
                            <span class="mt-0">Quadro dos sonhos</span>
                            <?php include_once '../components/quadroSonhos.php'; ?>
                        </div>
                    </div>

                    <div class="mid filter" data-filter-class>
                        <?php include_once '../components/tarefas.php'; ?>

                        <?php include_once '../components/pomodoro.php'; ?>
                    </div>
                    
                    <!-- COMPONENTS -->
                    <span class="mt-4 filter" data-filter-class>Resumo do seu dia</span>
                    <div class="components filter" data-filter-class>
                        <?php include_once '../components/checklistSemanal.php'; ?>
                        <?php include_once '../components/naoEsquecer.php'; ?>
                        <?php include_once '../components/treinos.php'; ?>
                    </div>

                    <div class="components mb-5 filter" data-filter-class>
                        <?php include_once '../components/rotina.php'; ?>
                        <div class="item">
                            <?php include_once '../components/compromissos.php'; ?>
                            <?php include_once '../components/objetivoDia.php'; ?>
                        </div>
                        <?php include_once '../components/refeicoes.php'; ?>
                    </div>
                    <!-- END -->
                    
                    <div class="sonsCaverna filter" data-filter-class>
                        <span>Playlist Caverna</span>
                        <div class="sons">
                            <!-- // -->
                            <?php include_once '../includes/playlist.php'; ?>
                            <!-- // -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- INTERVALO -->
            <div class="intervalo" style="display:none;">
                <svg height="240" width="240">
                    <line class="loader-pointer" x1="120" y1="120" x2="120" y2="97"/>
                    <line class="loader-line" x1="120" y1="120" x2="135" y2="120" />
                    <circle class="loader-circle" cx="120" cy="120" r="30" />
                    <circle class="loader-center" cx="120" cy="120" r="5" />
                </svg>
                <h1>Hora da pausa!</h1>
                <p>Aproveite para relaxar, e volte quando o intervalo acabar!</p>
                <h5>00:00</h5>
                <button id="fecharIntervalo">Não quero uma pausa!</button>
            </div>
        </div>
    </div>
    <?php include_once '../includes/footer.php'; ?>
     <!-- MODALS -->
     <div class="globalModals">
        <?php include_once '../modals/naoEsquecer.php'; ?>
        <?php include_once '../modals/treinos.php'; ?>
        <?php include_once '../modals/rotina.php'; ?>
        <?php include_once '../modals/compromissos.php'; ?>
        <?php include_once '../modals/refeicoes.php'; ?>
        <?php include_once '../modals/objetivo.php'; ?>
        <?php include_once '../modals/flow.php'; ?>
        <?php include_once '../modals/tarefas.php'; ?>
        <?php include_once '../modals/configPomodoro.php'; ?>
        <?php include_once '../modals/resetModal.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
    <script src="../assets/js/functions.js"></script>
    <script src="../assets/js/functionsFlow.js"></script>
    <script src="../assets/js/uploadPhotos.js"></script>
    <script>
    var listaRotinas = document.getElementById("listaRotinas");

    function verificarAlturaDaLista() {
        var alturaLista = listaRotinas.scrollHeight;
        var alturaPai = listaRotinas.parentElement.clientHeight;
        var porcentagem = (alturaLista / alturaPai) * 100;

        if (porcentagem >= 70) {
            listaRotinas.classList.add("customScroll");
        } else {
            listaRotinas.classList.remove("customScroll");
        }
    }

    verificarAlturaDaLista();

    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            verificarAlturaDaLista();
        });
    });

    var config = { childList: true };

    observer.observe(listaRotinas, config);
        function resetVideoContainers(except = null) {
            document.querySelectorAll('.video-container').forEach(container => {
                if (container !== except) {
                    const thumbnailUrl = container.getAttribute('data-thumbnail');
                    container.innerHTML = `<img src="${thumbnailUrl}" alt="Video Thumbnail" class="video-thumbnail">`;
                }
            });
        }

        function playVideo(container, videoId) {
            resetVideoContainers(container);
            const iframeContainer = document.createElement('div');
            iframeContainer.classList.add('iframe-container');
            const iframe = document.createElement('iframe');
            iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&controls=1`);
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allow', 'autoplay; encrypted-media');
            iframe.setAttribute('allowfullscreen', '');
            
            iframeContainer.appendChild(iframe);
            
            container.innerHTML = '';
            container.appendChild(iframeContainer);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var videoContainers = document.querySelectorAll('.video-container');
            videoContainers.forEach(function(container) {
                const img = container.querySelector('img');
                container.setAttribute('data-thumbnail', img.src); 
                container.addEventListener('click', function() {
                    playVideo(this, this.getAttribute('data-video-id'));
                });
            });
        });
    </script>
</body>
</html>
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
                <div class="desafioFinal">
                    <div class="infoDesafio">
                        <div class="step1">
                            <h1>Parabéns, você completou o desafio!</h1>
                            <p>Essa conquista já foi registrada no seu Perfil Caverna.</p>
                            <div class="content">
                                <div>
                                    <img src="../assets/images/default.jpg">
                                    <div class="mask"></div>
                                </div>

                                <div>
                                <p style="font-size: 20px;">Que tal recordar o registro que você fez antes de iniciar o desafio?</p>
                                    <p>Eu sou Maria, uma mãe solteira que trabalha em tempo integral como 
                                    assistente administrativa em uma empresa local. Sempre me esforcei para 
                                    cuidar da minha filha, Ana, de oito anos, fornecendo tudo o que ela precisa. 
                                    No entanto, recentemente, a empresa em que trabalho passou por dificuldades
                                    financeiras e reduziu as horas de trabalho dos funcionários para cortar 
                                    custos. </p>
                                </div>
                            </div>
                        </div>

                        <div class="step2" style="display:none;">
                            <h1>Registre sua transformação! 🏆</h1>
                            <div class="content">
                                <div>
                                    <small class="mb-3">Como se sente agora? Descreva esse momento com um pequeno texto e registre com algumas fotos.
                                    <br>
                                    Essas informações ficarão salvas no seu Perfil Caverna e você poderá consultar o histórico sempre que quiser.</small>

                                    <textarea placeholder="Escreva sua mensagem..." class="form-control" required></textarea>
						            <span>Upload de foto</span> 
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>

                        <div class="step3" style="display:none;">
                            <div class="icon">
                                <div class="circle-border-success"></div>
                                <div class="circle-success">
                                    <img src="../assets/images/icons/icCheck.svg">
                                </div>
                            </div>
                            <h1>Registro concluído!</h1>
                            <p>Gostaria de iniciar um novo desafio?</p>

                            <div class="content">
                                <div class="other">
                                    <a href="desafio.php"><button>Sim! Eu aceito.</button></a>
                                    <button id="agoraNaoBtn" data-bs-toggle="modal" data-bs-target="#concluirDesafio">Agora não.</button>
                                </div>
                            </div>
                        </div>

                        <div class="navigation">
                            <button id="prevStep" class="back">Anterior</button>
                            <button id="nextStep" class="next">Próximo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALS -->
    <div class="globalModals">
        <?php include_once '../modals/desafio.php'; ?>
        <?php include_once '../modals/concluirDesafio.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            var currentStep = 1;
            var totalSteps = 3; 
                    
            $('.next').click(function(){
                $('.step' + currentStep).hide();
                currentStep++;
                $('.step' + currentStep).show();
                if(currentStep > 1) {
                    $('#prevStep').show();
                }
                if(currentStep === totalSteps) { 
                    $('#nextStep').hide(); 
                    $('.navigation').hide(); 
                }

                if (currentStep === 2) {
                    if ($('textarea').val().trim() !== '') {
                        $('#nextStep').prop('disabled', false);
                    } else {
                        $('#nextStep').prop('disabled', true);
                    }
                }
            });

            $('.back').click(function(){
                $('.step' + currentStep).hide();
                currentStep--;
                $('.step' + currentStep).show();
                if(currentStep == 1) {
                    $('#prevStep').hide();
                }
                if(currentStep < totalSteps) { 
                    $('#nextStep').show();
                    $('.navigation').show(); 
                }

                if (currentStep === 2) {
                    $('#nextStep').prop('disabled', true);
                }
            });

            $('#prevStep').hide(); 

            $('#agoraNaoBtn').click(function(){
                $('#concluirDesafio').modal('show'); 

                setTimeout(function() {
                    $('#concluirDesafio').modal('hide'); 
                    window.location.href = '../dashboard'; 
                }, 55000); 
            });

            $('textarea').on('input', function() {
                if (currentStep === 2) {
                    if ($(this).val().trim() !== '') {
                        $('#nextStep').prop('disabled', false);
                    } else {
                        $('#nextStep').prop('disabled', true);
                    }
                }
            });
        });
    </script>
</body>
</html>
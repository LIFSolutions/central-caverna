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
    <style>
        /* Ajustes tabelas */
        .finanHead .li > :first-child{
            margin-right: auto;
        }

        .previsaoEntrada{
            justify-content: space-between;
        }

        .previsaoEntrada > div {
            width: 100% !important;
        }
    </style>
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
                        <h1>Financeiro</h1>
                        
                        <div class="financeiro mb-5">
                            <div class="finanHead">
                                <div style="flex-grow: 1;">
                                    <h6>Caixa Atual</h6>
                                    <ul style="overflow-y: auto;max-height:100%;">
                                        <li>
                                            <span>Itaú</span>
                                            <span contenteditable="">R$ 1.250,00</span>
                                        </li>
                                        <li>
                                            <span>Nubank</span>
                                            <span contenteditable="">R$ 1.250,00</span>
                                        </li>
                                        <li>
                                            <span>Caixa</span>
                                            <span contenteditable="">R$ 1.250,00</span>
                                        </li>
                                        <li>
                                            <span>Total</span>
                                            <span>R$ 3.750,00</span>
                                        </li>
                                    </ul>
                                    <div class="add">
                                        <div class="info" data-bs-toggle="modal" data-bs-target="#addBanco">
                                            <img src="../assets/images/icons/icAdd.svg">
                                            <span>Adicionar Banco</span>
                                        </div>
                                    </div>
                                </div>

                                <div style="flex-grow: 3;">
                                    <canvas id="myChart"></canvas>
                                </div>
                                

                                <!--
                                <div>
                                    <h6 class="mb-3">Resumo do mês atual</h6>
                                    <div class="block">
                                        <small>Previsão <br>de Custo</small>
                                        <p class="negative">R$ 1.000,00</p>
                                    </div>

                                    <div class="block">
                                        <small>Previsão <br>de Receita</small>
                                        <p class="positive">R$ 300,00</p>
                                    </div>

                                    <div class="block">
                                        <small>Previsão <br>de Saldo do mês</small>
                                        <p>R$ -700,00</p>
                                    </div>
                                </div>

                                <div>
                                    <h6 class="mb-3">Previsão do próximo mês</h6>
                                    <div class="block">
                                        <small>Previsão <br>de Custo</small>
                                        <p class="negative">R$ 1.000,00</p>
                                    </div>

                                    <div class="block">
                                        <small>Previsão <br>de Receita</small>
                                        <p class="positive">R$ 300,00</p>
                                    </div>

                                    <div class="block">
                                        <small>Previsão <br>de Saldo do mês</small>
                                        <p>R$ -700,00</p>
                                    </div>
                                </div>
                                -->
                            </div>
                            <!-- // -->
                            <span>Controle Geral de Custos</span>
                            <div class="controlCustos">
                                <div>
                                    <h6>Custo Fixo Definido <span class="add-custo">Adicionar</span></h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Dia Pag.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Aluguel</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>9</td>
                                            </tr>

                                            <tr>
                                                <td>Internet</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>20</td>
                                            </tr>

                                            <tr>
                                                <td>Plano de Saúde</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>15</td>
                                            </tr>

                                            <tr>
                                                <td>Secretária</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>15</td>
                                            </tr>

                                            <tr>
                                            <td class="total">Total</td>
                                                <td colspan="2" class="total">R$ 400,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div>
                                    <h6>Custo Fixo Variável  <span class="add-custo">Adicionar</span></h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Dia Pag.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Energia</td>
                                                <td contenteditable="">R$ 100,00</td>
                                                <td>9</td>
                                            </tr>

                                            <tr>
                                                <td>Água</td>
                                                <td contenteditable="">R$ 100,00</td>
                                                <td>20</td>
                                            </tr>

                                            <tr>
                                                <td>Mercado</td>
                                                <td contenteditable="">R$ 100,00</td>
                                                <td>15</td>
                                            </tr>

                                            <tr>
                                                <td>Combustível</td>
                                                <td contenteditable="">R$ 100,00</td>
                                                <td>15</td>
                                            </tr>

                                            <tr>
                                                <td class="total">Total</td>
                                                <td colspan="2" class="total">R$ 400,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div>
                                    <h6>Outros Custos <span class="add-custo">Adicionar</span></h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Dia Pag.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cartão Itáu</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>9</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Viagem</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>9</td>
                                            </tr>

                                            <tr>
                                                <td class="total">Total</td>
                                                <td colspan="2" class="total">R$ 200,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- // -->
                            <div class="totalCustos">
                                <h6>Previsão de custo mensal</h6>
                                <p class="negative">R$ 1.000,00</p>
                            </div>
                            <!-- // -->
                            <span>Previsão de Entradas</span>
                            <div class="previsaoEntrada">
                                <div>
                                    <h6>Esse mês <span class="add-custo">Adicionar</span></h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Dia Rec.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Aluguel</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>9</td>
                                            </tr>

                                            <tr>
                                                <td>Salário</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>20</td>
                                            </tr>

                                            <tr>
                                                <td>Dividendos</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>15</td>
                                            </tr>

                                            <tr>
                                            <td class="total">Total</td>
                                                <td colspan="2" class="total">R$ 300,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div>
                                    <h6>Próximo mês<span class="add-custo">Adicionar</span></h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Dia Pag.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Pro Labore</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>9</td>
                                            </tr>

                                            <tr>
                                                <td>Sálario</td>
                                                <td contenteditable="">R$ 100,00</span></td>
                                                <td>20</td>
                                            </tr>

                                            <tr>
                                                <td>Projetos</td>
                                                <td  contenteditable="">R$ 100,00</td>
                                                <td>15</td>
                                            </tr>

                                            <tr>
                                                <td class="total">Total</td>
                                                <td colspan="2" class="total">R$ 300,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                             <!--
                             <div class="totalCustos">
                                <h6>Previsão de entradas</h6>
                                <p class="positive">R$ 600,00</p>
                            </div>
                             -->
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
    </div>
    <?php include_once '../modals/addBanco.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Resumo',
                data: [300, 350, 1000, 200, 450, 500],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
    <script>

        $('.inputValores').each(function() {
            IMask(this, {
                mask: 'R$ num',
                blocks: {
                num: {
                    mask: Number,
                    scale: 2,
                    thousandsSeparator: '.',
                    radix: ',',
                    mapToRadix: [',']
                }
                }
            });
        });

        $('#btn-add-banco').on('click',function(){
            var nomeBanco = $('#nomeBanco').val();
            var valorBanco = $('#valorBanco').val();
            valorBanco = valorBanco.replace('R$ ','');

            valorBanco = parseFloat(valorBanco.replace('.', '').replace(',', '.')); // Convert to number
            valorBanco = valorBanco.toLocaleString('pt-BR', { minimumFractionDigits: 2 });

            $('.finanHead ul li:last').before('<li>Banco ' + nomeBanco + ' <span>R$ ' + valorBanco + '</span></li>');
            
            var total = 0;
            $('.finanHead ul li:not(:last)').each(function() {
                var valueStr = $(this).find('span').text().replace('R$', '').replace('.', '').replace(',', '.').trim();
                var value = parseFloat(valueStr);
                total += value;
            });

            var formattedTotal = total.toLocaleString('pt-BR', { minimumFractionDigits: 2 });

            $('.finanHead ul li:last span').text('R$ ' + formattedTotal);

            $('#addBanco').modal('hide');
            $('#nomeBanco').val('');
            $('#valorBanco').val('');
        });

        $('.add-custo').on('click',function(){
            var novaLinha = '<tr><td contenteditable="true"></td><td>R$ <span contenteditable></span></td><td contenteditable="true"></td></tr>';
            var table = $(this).closest('h6').next('.table');
            table.find('tbody').prepend(novaLinha);

            table.find('td[contenteditable=true]').on('input', function() {
            var allFilled = true;
            table.find('td[contenteditable=true]').each(function() {
                if (!$(this).text().trim()) {
                    allFilled = false;
                    return false;
                }
            });
            if (allFilled) {

                var total = 0;
                
                table.find('tbody tr:not(:last)').each(function() {
                    var valorStr = $(this).find('td:nth-child(2)').text().replace('R$', '').replace('.', '').replace(',', '.').trim();
                    var valor = parseFloat(valorStr);
                    console.log(valor);
                    total += valor;
                });
                
                var formattedTotal = total.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
                
                table.find('.total').eq(1).text('R$ ' + formattedTotal);

                var totalCustos = 0;
                $('.controlCustos table').each(function() {
                    var lastRowValueStr = $(this).find('tbody tr:last td:nth-child(2)').text().replace('R$', '').replace('.', '').replace(',', '.').trim();
                    var lastRowValue = parseFloat(lastRowValueStr);
                    totalCustos += lastRowValue;
                });
                var formattedTotalCustos = totalCustos.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
                $('.totalCustos p').eq(0).text('R$ ' + formattedTotalCustos);

                var totalEntradasMes = 0;
                $('.previsaoEntrada table:first').each(function() {
                    var lastRowValueStr = $(this).find('tbody tr:last td:nth-child(2)').text().replace('R$', '').replace('.', '').replace(',', '.').trim();
                    var lastRowValue = parseFloat(lastRowValueStr);
                    totalEntradasMes += lastRowValue;
                });
                var formattedTotalEntradasMes = totalEntradasMes.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
                $('.totalCustos p').eq(1).text('R$ ' + formattedTotalEntradasMes);

                var totalEntradasProx = 0;
                $('.previsaoEntrada table:last').each(function() {
                    var lastRowValueStr = $(this).find('tbody tr:last td:nth-child(2)').text().replace('R$', '').replace('.', '').replace(',', '.').trim();
                    var lastRowValue = parseFloat(lastRowValueStr);
                    totalEntradasProx += lastRowValue;
                });
                var formattedTotalEntradasProx = totalEntradasProx.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
                

                $('.block:contains("Previsão de Custo") p').text('R$ ' + formattedTotalCustos);

                $('.block:contains("Previsão de Receita") p').eq(0).text('R$ ' + formattedTotalEntradasMes);
                $('.block:contains("Previsão de Receita") p').eq(1).text('R$ ' + formattedTotalEntradasProx);

                var saldoMes = totalEntradasMes - totalCustos;
                var formattedSaldoMes = saldoMes.toLocaleString('pt-BR', { minimumFractionDigits: 2 });

                var saldoProx = totalEntradasProx - totalCustos;
                var formattedSaldoProx = saldoProx.toLocaleString('pt-BR', { minimumFractionDigits: 2 });

                $('.block:contains("Previsão de Saldo") p').eq(0).text('R$ ' + formattedSaldoMes);
                $('.block:contains("Previsão de Saldo") p').eq(1).text('R$ ' + formattedSaldoProx);

            }
        });
        });

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
    </script>

    <script>
        function uploadImage(element) {
            var input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';

            input.click();

            input.onchange = function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var uploadedImage = document.createElement('img');
                    uploadedImage.src = e.target.result;
                    uploadedImage.classList.add('uploadedImage', 'imagemCusto');

                    var imageId = 'uploadedImage_' + Date.now(); 
                    uploadedImage.id = imageId;

                    element.innerHTML = '';
                    element.appendChild(uploadedImage);
                    localStorage.setItem(imageId, e.target.result);
                };

                reader.readAsDataURL(file);
            };
        }

        window.onload = function() {
            for (var i = 1; i <= 4; i++) {
                var uploadedImageSrc = localStorage.getItem('uploadedImage_boxImage_' + i);
                if (uploadedImageSrc) {
                    var uploadedImage = document.createElement('img');
                    uploadedImage.src = uploadedImageSrc;
                    uploadedImage.classList.add('uploadedImage', 'imagemCusto');
                    document.getElementById('boxImage_' + i).appendChild(uploadedImage);
                }
            }
        };
    </script>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="modalDesafio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Criando desafio</h1>
			</div>

			<div class="modal-body">
				<div class="select">
					<div>
						<img src="../assets/images/icons/icDesafioExpress.svg">
						<img src="../assets/images/logoExpress.svg">
						<span>30 dias</span>
						<button id="btnComecar">Começar</button>
					</div>

					<div>
						<img src="../assets/images/icons/icDesafioCavernoso.svg">
						<img src="../assets/images/logoCavernoso.svg">
						<span>60 dias</span>
						<button id="btnComecar">Começar</button>
					</div>
				</div>
				<!--  -->
				<div class="desafioOptions" style="display:none">
					<!-- STEP1 -->
					<div class="step1">
						<span class="abdicar">Step 1 - Me comprometo a abdicar de:</span>
						<div class="formItem">
							<button id="emojiPickerBtn">😀</button>
							<input type="text" id="inputAbdicar" class="form-control" placeholder="Escreva aqui" onkeypress="if(event.keyCode==13){document.getElementById('btnAdicionarAbdicar').click();}">
							<button id="btnAdicionarAbdicar" disabled>Adicionar</button>
						</div>
						<small>Clique nas sugestões abaixo e adicione à sua lista caso faça sentido.</small>
						<div class="sugestoesAbdicar">
							<ul>
								<li id="sugestao1">🔞 Pornografia</li>
								<li id="sugestao2">🍺 Álcool</li>
								<li id="sugestao3">😵‍💫 Drogas</li>
								<li id="sugestao4">🎰 Jogos de Aposta</li>
								<li id="sugestao5">🎉 Festas</li>
								<li id="sugestao6">🧁 Fast Food</li>
								<li id="sugestao7">✈️ Viagens</li>
								<li id="sugestao8">🎮 Video Game</li>
							</ul>
						</div>
						<div class="itensAdicionadosAbdicar">
							<span>Itens Adicionados</span>
							<ul></ul>
						</div>
						<div class="buttonsNav">
							<button class="next">Avançar</button>
						</div>
					</div>
					<!-- STEP2 -->
					<div class="step2" style="display:none">
						<span class="falhar">Step 2 - Não posso falhar::</span>
						<div class="formItem">
							<button id="emojiPickerBtn">😀</button>
							<input type="text" id="inputFalhar" class="form-control" placeholder="Escreva Aqui" onkeypress="if(event.keyCode==13){document.getElementById('btnAdicionarFalhar').click();}">
							<button id="btnAdicionarFalhar" class="bg" disabled>Adicionar</button>
						</div>
						<small>Clique nas sugestões abaixo e adicione à sua lista caso faça sentido.</small>
						<div class="sugestoesFalhas">
							<ul>
								<li id="sugestao9">☀️ Ritual Matinal</li>
								<li id="sugestao10">🌙 Ritual Noturno</li>
								<li id="sugestao11">🏃🏻 30min de Atividade Física</li>
								<li id="sugestao12">✅ 2h Flow Produtividade</li>
								<li id="sugestao13">📚 1h Flow Estudos</li>
								<li id="sugestao14">🙏🏻 Devocional</li>
							</ul>
						</div>
						<div class="itensAdicionadosFalhas">
							<span>Itens Adicionados</span>
							<ul></ul>
						</div>
						<div class="buttonsNav">
							<button class="back">Voltar</button>
							<button class="next">Avançar</button>
						</div>
					</div>
					<!-- STEP 3 -->
					<div class="step3" style="display:none">
						<span class="mensagem">Step 3 - Descreva sua situação atual</span>
						<span class="mt-3">Você será recordado desse registro na conclusão do desafio</span>
						<textarea placeholder="Descreva aqui a sua situação atual" class="form-control"></textarea>
						<span class="mt-3">Faça um registro com fotos (Opcional)</span>
						<input class="form-control" type="file" id="formFile">
						
						<div class="buttonsNav">
							<button class="back">Voltar</button>
							<button class="iniciarDesafio">Iniciar</button>
						</div>
					</div>
					<!-- END -->
				</div>
			</div>
		</div>
	</div>
</div>
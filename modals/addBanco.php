<!-- Modal -->
<div class="modal fade" id="addBanco" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Banco</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="compromisso">
                    <div>
                        <select id="nomeBanco" class="form-select">
                            <option value="Itaú">Itaú</option>
                            <option value="Bradesco">Bradesco</option>
                            <option value="BTG">BTG Pactual</option>
                            <option value="Santander">Santander</option>
                            <option value="Itaúsa">Itaúsa</option>
                            <option value="BB">Banco do Brasil</option>
                            <option value="Caixa">Caixa Econômica Federal</option>
                            <option value="Pan">Banco Pan</option>
                            <option value="Banrisul">Banrisul</option>
                            <option value="ABC">Banco ABC</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <input class="form-control inputValores" id="valorBanco" placeholder="Valor" value="R$ " required>
                    </div>

                    <button id="btn-add-banco">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
</div>

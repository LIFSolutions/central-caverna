document.addEventListener("DOMContentLoaded", function() {
    // Seleciona os elementos createBlockMatinal e createBlockNoturno
    var createBlockMatinal = document.querySelector(".createBlockMatinal");
    var createBlockNoturno = document.querySelector(".createBlockNoturno");

    // Verifica se o bloco matinal já foi criado anteriormente
    var blocoCriadoMatinal = localStorage.getItem("blocoCriadoMatinal");
    if (blocoCriadoMatinal === "true") {
        // Se o bloco matinal foi criado, oculta a div createBlockMatinal
        createBlockMatinal.style.display = "none";
        // Exibe o botão btnAddBloco
        var btnAddBloco = document.querySelector(".btnAddBlocoMatinal");
        btnAddBloco.style.display = "block";
    }

    // Verifica se o bloco noturno já foi criado anteriormente
    var blocoCriadoNoturno = localStorage.getItem("blocoCriadoNoturno");
    if (blocoCriadoNoturno === "true") {
        // Se o bloco noturno foi criado, oculta a div createBlockNoturno
        createBlockNoturno.style.display = "none";
        // Exibe o botão btnAddBloco
        var btnAddBloco = document.querySelector(".btnAddBlocoNoturno");
        btnAddBloco.style.display = "block";
    }

    // Adiciona um evento de clique ao elemento createBlockMatinal
    createBlockMatinal.addEventListener("click", function() {
        // Salva o valor true no localStorage para o bloco matinal
        localStorage.setItem("blocoCriadoMatinal", "true");
        // Oculta a div createBlockMatinal
        createBlockMatinal.style.display = "none";
        // Exibe o botão btnAddBloco
        var btnAddBloco = document.querySelector(".btnAddBlocoMatinal");
        btnAddBloco.style.display = "block";
    });

    // Adiciona um evento de clique ao elemento createBlockNoturno
    createBlockNoturno.addEventListener("click", function() {
        // Salva o valor true no localStorage para o bloco noturno
        localStorage.setItem("blocoCriadoNoturno", "true");
        // Oculta a div createBlockNoturno
        createBlockNoturno.style.display = "none";
        // Exibe o botão btnAddBloco
        var btnAddBloco = document.querySelector(".btnAddBlocoNoturno");
        btnAddBloco.style.display = "block";
    });
    
});
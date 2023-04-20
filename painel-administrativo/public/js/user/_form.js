document.addEventListener("DOMContentLoaded", function () {
    const senha = document.getElementById("senha");
    const confirmarSenha = document.getElementById("confirmar_senha");
    const mensagemErro = document.getElementById("mensagem-erro");

    senha.addEventListener("input", verificarSenha);
    confirmarSenha.addEventListener("blur", verificarSenha);

    function verificarSenha() {
        if (senha.value !== confirmarSenha.value) {
            mensagemErro.innerText = "As senhas não correspondem.";
        } else {
            mensagemErro.innerText = "";
        }
    }


})

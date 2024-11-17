function validarLogin() {
    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;

    const emailValido = "admestacio@admin.com";
    const senhaValida = "estacio123";

    if (email === emailValido && senha === senhaValida) {
        window.location.href = "horario.php";
        return false;
    }
    else {
        const mensagemErro = document.getElementById("mensagemErro");
        mensagemErro.innerHTML = "<p class='erro'>E-mail ou senha incorretos!</p>";
        return false;
    }
}
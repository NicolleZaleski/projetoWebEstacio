// document.querySelector("form").addEventListener("submit", function(event) {
//     const matricula = document.getElementById("matricula").value;
//     const curso = document.getElementById("curso").value;

//     if (matricula === "" || curso === "") {
//         alert("Por favor, preencha todos os campos obrigatórios!");
//         event.preventDefault();
//     }
// });

const statusCadastro = "<?php echo $status; ?>";

    if (statusCadastro === "success") {
        alert("Aula cadastrada com sucesso!");
    } else if (statusCadastro === "error") {
        alert("Falha ao cadastrar a aula. Tente novamente.");
    }
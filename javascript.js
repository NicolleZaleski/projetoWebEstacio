document.querySelector("form").addEventListener("submit", function(event) {
    const matricula = document.getElementById("matricula").value;
    const curso = document.getElementById("curso").value;

    if (matricula === "" || curso === "") {
        alert("Por favor, preencha todos os campos obrigatórios!");
        event.preventDefault();
    }
});
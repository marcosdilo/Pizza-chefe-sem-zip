const formulario = document.getElementById("meuForm");
formulario.addEventListener("submit", function(evento) {
    
evento.preventDefault();

const nomeUsuario = document.getElementById("nome").value.trim();
const emailUsuario = document.getElementById("email").value;
const senhaUsuario = document.getElementById("senha").value;
    
if (nomeUsuario === "") {
    alert("Por favor, preencha o seu nome.");
    return;
}

if (!emailUsuario.includes("@")) {
        alert("Por favor, coloque um e-mail válido!");
        return;
}

if (senhaUsuario.length < 6) {
    alert("A senha deve conter pelo menos 6 caracteres!");
    return;
}

alert("Tudo certo! Enviando seus dados...");
formulario.submit(); 
});

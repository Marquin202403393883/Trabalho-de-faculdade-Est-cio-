function VerificarCampoC() {
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var senhaC = document.getElementById("senha").value;
    var confirmar = document.getElementById("conf_senha").value;
    
    if (nome===""||email===""||senhaC===""||confirmar===""){
        alert("Por favor, preencha todos os campos para prosseguir.");
        return false;
    } else {
        return true;
    }
    }
    
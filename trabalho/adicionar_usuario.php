<?php

require_once 'classes/Usuarios1.php';
$u = new Usuarios();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="css/main1.css">
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>

<body>
<div id="corpo-form">
    <div class="container">
        <div id="corpo-form-cad">
            <form method="POST">
                <p>Nome</p>
                <input class = "nome" type="text" name="nome" maxlength="30"/>
                <p>E-mail</p>
                <input class = "email" type="email" name="email"  maxlength="40"/>
                <p>Telefone</p>
                <input class = "telefone" type="text" name="telefone"  maxlength="40"/>
                <input class = "submit" type="submit" value="ADICIONAR" name="" maxlength="15"/>
                <a href="listarUsuarios.php">Voltar</a>
            </form>
        </div>
    </div>
</div>
</main>
</body>

<?php

if(isset($_POST['nome'])):
    
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);

    if(!empty($nome) && !empty($email)):

        $u->conectar("projeto_faculdade", "localhost", "root", "");

        if($u->msgERRO == ""):

            if($u->adicionar($nome, $email, $telefone)):
                echo "<script>showAlert('Cadastrado com Sucesso! Acesse para entrar!');</script>";
            else:
                echo "<script>showAlert('Email já cadastrado!');</script>";
            endif;

        else:
            echo "<script>showAlert('Erro: {$u->msgERRO}');</script>";
        endif;
    
    else:
        echo "<script>showAlert('Preencha Todos os Campos!');</script>";
    endif;
endif;

?>

</html>
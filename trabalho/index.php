<?php
    require_once 'classes/Usuarios1.php';
    $usuario = new Usuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de Login </title>
    <link rel="stylesheet" href="css/main1.css">
    <script src="js/indexAlert.js"></script>
</head>

<body>
<div id="corpo-form">
<div class="container">
<div id="corpo-form-cad">
    <form method="POST" onsubmit="return VerificarCampoI()">
        <p>Usuário</p>
        <input type="email" name="email"/>
        <p>Senha</p>
        <input type="password" name="senha"/>
        <input type="submit" value="ACESSAR" name=""/>
        <a href="cadastrar.php">Ainda não é inscrito?</a>
    </form>
    <div>
</body>

<?php

if (isset($_POST['email'])):

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if (!empty($email) && !empty($senha)):

        $usuario->conectar("projeto_faculdade", "localhost", "root", "");

        if ($usuario->msgERRO == ""):

            if ($usuario->logar($email, $senha)):

                header("location: listarUsuarios.php");
            else:
                ?>
                <div class="msg-erro">
                    E-mail e/ou Senha Incorretos!
                </div>

            <?php

            endif;

        else:

            ?>

            <div class="msg-erro">

                <?php echo "Erro: " . $u->msgERRO; ?>

            </div>

        <?php


        endif;

    else:
        ?>
        <div class="msg-erro">
            Preencha Todos os Campos!
        </div>

    <?php
    endif;
endif;


?>

</html>

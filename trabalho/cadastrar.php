<?php

require_once 'classes/Usuarios1.php';
$u = new Usuarios();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de Login</title>
    <script src="js/cadastrarAlert.js"></script>
    <link rel="stylesheet" href="css/main1.css">
</head>

<body>
<div id="corpo-form">
<div class="container">
<div id="corpo-form-cad">
    <form method="POST" onsubmit="return VerificarCampoC()">
        <p>Nome</p>
        <input type="text" name="nome" id="nome" maxlength="30"/>
        <p>Telefone</p>
        <input type="text" name="telefone" id="telefone" maxlength="30"/>
        <p>E-mail</p>
        <input type="email" name="email" id="email" maxlength="40"/>
        <p>Senha</p>
        <input type="password" name="senha" id="senha" maxlength="15"/>
        <p>Confirmar Senha</p>
        <input type="password" name="conf_senha" id="senha"/>
        <input type="submit" value="CADASTRAR" name="" maxlength="15"/>
        <a href="index.php">Entrar</a>
    </form>
</div>

<?php

if(isset($_POST['nome'])):
    
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $conf_senha = addslashes($_POST['conf_senha']);

    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($conf_senha)):
        
        $u->conectar("projeto_faculdade", "localhost", "root", "");

        if($u-> msgERRO == ""):

            if($senha==$conf_senha):
           
                if($u->cadastrar($nome, $telefone, $email, $senha)):

                    ?>

                    <div id="msg-sucesso">
                        Cadastrado com Sucesso!
                    </div>

                    <?php
                
                else:

                    ?>

                    <div class="msg-erro">
                        Email já cadastrado!
                    </div>

                    <?php

                endif;

            else:

                ?>

                    <div class="msg-erro">
                        Senha e Confirmar Senha não correspondem!
                    </div>

                    <?php

            
            endif;


        else:

            ?>
           
            <div class="msg-erro"> 
                
                 <?php echo "Erro: ".$u->msgERRO; ?>
            
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

</body>
</html>

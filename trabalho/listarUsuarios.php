<?php
require_once 'classes/Usuarios1.php';

$usuarios = new Usuarios();

$usuarios->conectar("projeto_faculdade", "localhost", "root", "");

$lista_usuarios = $usuarios->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/listarusuarios.css">
    <script src="js/logadoAlert.js"></script>
</head>
<body>
<div class="container">
<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Ações</th> 
    </tr>
    <?php
    
    if (!$lista_usuarios) {
        echo "<tr><td colspan='4'>Erro ao buscar os usuários: " . $usuarios->msgERRO . "</td></tr>";
    } else {
        
        if (count($lista_usuarios) > 0) {
            
            foreach ($lista_usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['nome'] . "</td>";
                echo "<td>" . $usuario['telefone'] . "</td>";
                echo "<td>" . $usuario['email'] . "</td>";
                echo "<td>";
                echo "<a href='editar_usuario_form.php?id=" . $usuario['id_usuario'] . "'>Editar</a> ";
                echo "<form method='post' action='excluir_usuario.php' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='" . $usuario['id_usuario'] . "'>";
                echo "<input type='submit' value='Excluir'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum usuário encontrado.</td></tr>";
        }
    }
    ?>
</table>
<a class="saida" href="sair.php">SAIR</a>
</body>
</html>

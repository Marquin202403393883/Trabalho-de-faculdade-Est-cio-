<?php
require_once 'classes/Usuarios1.php';

$usuarios = new Usuarios();

$usuarios->conectar("projeto_faculdade", "localhost", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usuario = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    
    $editado = $usuarios->editarUsuario($id_usuario, $nome, $telefone, $email);
    
    if ($editado) {

        header("Location: listarUsuarios.php");
        exit();

    } else {

        echo "Erro ao editar usuário: " . $usuarios->msgERRO;
        
    }
}
?>

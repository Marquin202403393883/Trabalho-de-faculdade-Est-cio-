<?php
require_once 'classes/Usuarios1.php';

$usuarios = new Usuarios();

$usuarios->conectar("projeto_faculdade", "localhost", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id_usuario = $_POST['id'];
    
    $excluido = $usuarios->excluirUsuario($id_usuario);
    
    if ($excluido) {
        
        header("Location: listarUsuarios.php");
        exit();
    } else {
        
        echo "Erro ao excluir usuário: " . $usuarios->msgERRO;
    }
}
?>

<?php
function verificaAdminLogado()
{
    if (!isset($_SESSION['admin_autenticado']) or $_SESSION['admin_autenticado'] != true){
        $_SESSION['danger'] = 'Acesso Inválido';
        header('Location:http://localhost/mscode/desafio/views/admin/login.php');
        die();
    }
}

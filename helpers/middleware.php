<?php

//faz a verificacao se a sessao admin está setada e se ela é igual a true
function verificaAdminLogado()
{
    if (!isset($_SESSION['admin_autenticado']) or $_SESSION['admin_autenticado'] != true){
        $_SESSION['danger'] = 'Acesso Inválido';
        header('Location:http://localhost/mscode/desafio/views/admin/login.php');
        die();
    }
}


//faz a verificacao se a sessao de inscricao feita está setada e se ela é igual a true
function verificaInscricaoFeita()
{
    if (!isset($_SESSION['inscricaoFeita']) or $_SESSION['inscricaoFeita'] != true){
        $_SESSION['danger'] = 'Preencha o formulário e realize sua inscrição';
        header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
        die();
    }
}

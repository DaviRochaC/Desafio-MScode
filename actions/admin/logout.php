<?php


session_start();
session_unset(); //limpa as sessoes
session_destroy(); //destroi a sessao e faz o redirecionamento

header('Location:http://localhost/mscode/desafio/views/admin/login.php');
die();



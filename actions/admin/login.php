<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();


//importações de models para manipulação das classes
require_once('../../models/Usuario.php');
require_once('../../models/Admin.php');

//instancias
$userModel = new Usuario();
$adminModel = new Admin();


//verificando se os inputs nao vieram vazios ou nulos
if((!isset($_POST['email']) OR (strlen($_POST['email']) <= 0)) OR (!isset($_POST['senha']) OR (strlen($_POST['senha']) <= 0))){
    $_SESSION['danger'] = 'Os campos email e senha são obrigatórios!';
    header('Location: http://localhost/mscode/desafio/views/admin/login.php');
    die();
}

//variaveis
$email = htmlspecialchars($_POST['email']); 
$senha = htmlspecialchars($_POST['senha']);


//busca se existe algum usuario com o email passado, se nao existir redireciona
$usuario = $userModel->buscarUsuarioPorEmail($email);

if(!$usuario){
    $_SESSION['danger'] = 'Email ou senha inválidos!';
    header('Location: http://localhost/mscode/desafio/views/admin/login.php');
    die();
}

//busca se a criptografia da senha digitada bate com a criptografia da senha do usuario encontradado pelo email passado.
if(md5($senha) !=  $usuario['senha']){
$_SESSION['danger'] = 'Email ou senha inválidos!';
header('Location: http://localhost/mscode/desafio/views/admin/login.php');
die();
}

//verifica se o usuario encontrado é admin
$admin = $adminModel->buscarUsuarioAdminPorId($usuario['id']);

if(!$admin){
    $_SESSION['danger'] = 'Acesso inválido';
header('Location: http://localhost/mscode/desafio/views/admin/login.php');
die();
}

//liga as sessoes e faz o redirecionamento
$_SESSION['admin_autenticado'] = true;
$_SESSION['admin_id'] = $admin['id'];
$_SESSION['admin_nome'] = $admin['nome'];

header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
die();
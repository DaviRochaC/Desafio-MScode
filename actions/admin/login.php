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


if((!isset($_POST['email']) OR (strlen($_POST['email']) <= 0)) OR (!isset($_POST['senha']) OR (strlen($_POST['senha']) <= 0))){
    $_SESSION['danger'] = 'Os campos email e senha são obrigatórios!';
    header('Location: http://localhost/mscode/desafio/views/admin/login.php');
    die();
}


$email = htmlspecialchars($_POST['email']); 
$senha = htmlspecialchars($_POST['senha']);

$usuario= $userModel->buscarUsuarioPorEmail($email);

if(!$usuario){
    $_SESSION['danger'] = 'Email ou senha inválidos!';
    header('Location: http://localhost/mscode/desafio/views/admin/login.php');
    die();
}

if(md5($senha) !=  $usuario['senha']){
$_SESSION['danger'] = 'Email ou senha inválidos!';
header('Location: http://localhost/mscode/desafio/views/admin/login.php');
die();
}

$admin = $adminModel->buscarUsuarioAdminPorId($usuario['id']);

if(!$admin){
    $_SESSION['danger'] = 'Acesso inválido';
header('Location: http://localhost/mscode/desafio/views/admin/login.php');
die();
}

$_SESSION['admin_autenticado'] = true;
$_SESSION['admin_id'] = $admin['id'];
$_SESSION['admin_nome'] = $admin['nome'];

header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
die();
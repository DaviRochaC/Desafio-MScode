<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//importações
require_once('../../models/Usuario.php');
require_once('../../models/Admin.php');

//instancia
$usuarioModel = new Usuario();
$adminModel = new Admin();


$arrayUsuario = [
'email' => 'admin@admin.com',
'senha' => md5('123456')
];

$usuarioModel->create($arrayUsuario);

$usuario = $usuarioModel->buscarUsuarioPorEmail($arrayUsuario['email']);

$arrayAdmin = [
'nome' => 'Admin',
'usuarios_id' => $usuario['id']
];

$adminModel->create($arrayAdmin);


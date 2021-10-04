<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//importações de models para manipulação das classes
require_once('../../models/Inscricao.php');
require_once('../../models/Estado.php');
require_once('../../models/Cidade.php');
require_once('../../models/Bairro.php');
require_once('../../models/Endereco.php');
require_once('../../helpers/middleware.php');

verificaAdminLogado();

//instancias
$inscricaoModel = new Inscricao();
$estadoModel = new Estado();
$cidadeModel = new Cidade();
$bairroModel = new Bairro();
$enderecoModel = new Endereco();

die('aqui');

if (intval($_POST['id']) <= 0) {
    $_SESSION['danger'] = 'Inscrição inválida';
    header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
    die();
}

$id = intval($_POST['id']);

$inscricao = $inscricaoModel->buscarInscricaoPorId($id);

//verificacao de quem fez a inscricao, se for por landindpage faz o redirecionamento
if ($inscricao['landingpage']) {
    $_SESSION['danger'] = 'Acão não permitida';
    header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
    die();
}
//verifica se os campos foram setados e sao diferentes de vazio
$inscricaoModel->verificaCampos($_POST, array(
    'nome', 'cpf', 'email', 'data_nascimento', 'cep', 'rua',
    'numero', 'bairro', 'cidade', 'estado',
));

$cpf = $inscricaoModel->limpacpf(htmlspecialchars($_POST['cpf']));
$cep = $enderecoModel->limpacep(htmlspecialchars( $_POST['cep']));

//verifica se o cpf ou  email informado ja existe no banco pra nao duplicar
$cpfcadastrado = $inscricaoModel->buscarInscricaoPorCpf($cpf);
$emailcadastrado = $inscricaoModel->buscarInscricaoPorEmail(htmlspecialchars($_POST['email']),);

if ($cpfcadastrado['id'] != $inscricao['id']) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao CPF informado';
    header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
    die();
}

if ($emailcadastrado['id'] != $inscricao['id']) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao email informado';
    header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
    die();
}


//verifica se a foto foi setada
$fotosetada = $inscricaoModel->verificafoto($_FILES['imagem']['name'], $_FILES['imagem']['size']);



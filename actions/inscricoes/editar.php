<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//importações de models para manipulação das classes
require_once('../../models/Inscricao.php');
require_once('../../models/Imagem.php');
require_once('../../models/Estado.php');
require_once('../../models/Cidade.php');
require_once('../../models/Bairro.php');
require_once('../../models/Endereco.php');
require_once('../../helpers/middleware.php');

verificaAdminLogado();

//instancias
$inscricaoModel = new Inscricao();
$imagemModel = new Imagem('../../views/img/', 'Location:http://localhost/mscode/desafio/views/admin/inscricoes/perfil.php?id=$id', true, 5);
$estadoModel = new Estado();
$cidadeModel = new Cidade();
$bairroModel = new Bairro();
$enderecoModel = new Endereco();

if (intval($_POST['id']) <= 0) {
    $_SESSION['danger'] = 'Inscrição inválida';
    header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
    die();
}

//variaveis
$id = intval($_POST['id']);
$inscricao = $inscricaoModel->buscarInscricaoPorId($id);
$endereco = $enderecoModel->buscarEnderecoPorId($inscricao['enderecos_id']);
$bairro = $bairroModel->buscarBairroPorId($endereco['bairros_id']);
$cidade = $cidadeModel->buscarCidadePorId($bairro['cidades_id']);
$estado = $estadoModel->buscarEstadoPorId($cidade['estados_id']);




//verifica se os campos foram setados e sao diferentes de vazio
$inscricaoModel->verificaCampos($_POST, array(
    'nome', 'cpf', 'email', 'data_nascimento', 'cep', 'rua',
    'numero', 'bairro', 'cidade', 'estado',
));

$cpf = $inscricaoModel->limpacpf(htmlspecialchars($_POST['cpf']));
$cep = $enderecoModel->limpacep(htmlspecialchars($_POST['cep']));

//verifica se o cpf ou  email informado ja existe no banco pra nao duplicar
$cpfcadastrado = $inscricaoModel->buscarInscricaoPorCpf($cpf);
$emailcadastrado = $inscricaoModel->buscarInscricaoPorEmail(htmlspecialchars($_POST['email']));

if ($cpfcadastrado AND $cpfcadastrado['id'] != $inscricao['id']) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao CPF informado';
    header("Location:http://localhost/mscode/desafio/views/admin/inscricoes/perfil.php?id=$id");
    die();
    
}

if ($emailcadastrado AND $emailcadastrado['id'] != $inscricao['id']) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao email informado';
    header("Location:http://localhost/mscode/desafio/views/admin/inscricoes/perfil.php?id=$id");
    die();
}



//verifica se a foto foi setada
$fotosetada = $inscricaoModel->verificafoto($_FILES['imagem']['name'], $_FILES['imagem']['size']);

if ($fotosetada) {
     
   $nomefoto = str_replace('http://localhost/mscode/desafio/views/img/', '', $inscricao['foto']);
   unlink('../../views/img/' . $nomefoto);
}

//atualizar o estado

$arrayNovoEstado = [
    'sigla' => htmlspecialchars($_POST['estado'])
];

$novoEstado = $estadoModel->getEstado($arrayNovoEstado['sigla']);

$arrayNovaCidade = [
    'nome' => htmlspecialchars($_POST['cidade']),
    'estados_id' => $novoEstado['id']
];

$novaCidade = $cidadeModel->getCidade($arrayNovaCidade['nome'], $arrayNovaCidade['estados_id']);

$arrayNovoBairro = [
    'nome' => htmlspecialchars($_POST['bairro']),
    'cidades_id' => $novaCidade['id']
];

$novoBairro = $bairroModel->getBairro($arrayNovoBairro['nome'], $arrayNovoBairro['cidades_id']);


$complemento = htmlspecialchars($_POST['complemento']);

if (!isset($_POST['complemento']) or $_POST['complemento'] == '') {
    $complemento = null;
}

$arrayNovoEndereço = [
    'rua' => htmlspecialchars($_POST['rua']),
    'numero' => htmlspecialchars($_POST['numero']),
    'cep' => $cep,
    'bairros_id' => $novoBairro['id'],
    'complemento' => $complemento
];

$novoEndereco = $enderecoModel->getEndereco($arrayNovoEndereço['rua'], $arrayNovoEndereço['numero'], $arrayNovoEndereço['cep'], $arrayNovoEndereço['bairros_id'], $arrayNovoEndereço['complemento']);

//salvar foto na pasta img

if($fotosetada){
$imagem = $imagemModel->cadastrar($_FILES);
$urlimagem = 'http://localhost/mscode/desafio/views/img/'.$imagem;
}

$urlimagem = $inscricao['foto'];

//cadastrar inscricao
$arrayNovaInscricao = [
    'nome' => htmlspecialchars($_POST['nome']),
    'email' => htmlspecialchars($_POST['email']),
    'data_nascimento' => htmlspecialchars($_POST['data_nascimento']),
    'cpf' => $cpf,
    'foto' => $urlimagem,
    'enderecos_id' => $novoEndereco['id'],
    'landingpage' => ($_SESSION['admin_autenticado']) ? 0 : 1
];



$inscricao = $inscricaoModel->uptade($inscricao['id'],$arrayNovaInscricao);

$_SESSION['success'] = ' Inscrição editada com sucesso!';
header("Location:http://localhost/mscode/desafio/views/admin/inscricoes/perfil.php?id=$id");
die();

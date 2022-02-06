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

//verificacao se o admin está logado 
verificaAdminLogado(); 

//instancias
$inscricaoModel = new Inscricao();
$imagemModel = new Imagem('../../views/img/', 'http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se', true, 5);
$estadoModel = new Estado();
$cidadeModel = new Cidade();
$bairroModel = new Bairro();
$enderecoModel = new Endereco();



if (intval($_GET['id'] <= 0)) {
  $_SESSION['danger'] = 'Inscrição inválida';
  header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
  die();
}

//verificacao de quem fez a inscricao, se for por landindpage faz o redirecionamento
if ($inscricao['landingpage']) {
  $_SESSION['danger'] = 'Acão não permitida';
  header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
  die();
}




//variaveis
$id = intval($_GET['id']);
$inscricao = $inscricaoModel->buscarInscricaoPorId($id);
$endereco = $enderecoModel->buscarEnderecoPorId($inscricao['enderecos_id']);
$bairro = $bairroModel->buscarBairroPorId($endereco['bairros_id']);
$cidade = $cidadeModel->buscarCidadePorId($bairro['cidades_id']);
$estado = $estadoModel->buscarEstadoPorId($cidade['estados_id']);



//apagando inscrição e o arquivo da pasta foto
$inscricaoModel->deletarInscricao($inscricao['id']);
$nomefoto = str_replace('http://localhost/mscode/desafio/views/img/', '', $inscricao['foto']);
unlink('../../views/img/' . $nomefoto);

//verificando se existe mais alguma inscricao vinculada ao endereco da inscricao apagada
//se nao existir deleta o endereço do banco
$existeInscricao = $inscricaoModel->buscarInscricaoPorEnderecosId($inscricao['enderecos_id']);
if (!$existeInscricao) {
  $enderecoModel->deletarEndereco($inscricao['enderecos_id']);
}


//verificando se existe mais algum endereco vinculado ao bairro da inscricao apagada
//se nao existir deleta o bairro do banco
$existeEndereco = $enderecoModel->buscarEndereçoPorBairrosId($endereco['bairros_id']);
if (!$existeEndereco) {
  $bairroModel->deletarBairro($endereco['bairros_id']);
}

//verificando se existe mais algum bairro vinculado a cidade da inscricao apagada
//se nao existir deleta a cidade do banco
$existeBairro = $bairroModel->buscarBairroPorCidadesId($bairro['cidades_id']);
if (!$existeBairro) {
  $cidadeModel->deletarCidade($bairro['cidades_id']);
}

//verificando se existe mais alguma cidade vinculado ao estado da inscricao apagada
//se nao existir deleta o estado do banco
$existeCidade = $cidadeModel->buscarCidadePorEstadosId($cidade['estados_id']);
if (!$existeCidade) {

  $estadoModel->deletarEstado($cidade['estados_id']);
}

//liga a sessão do alert e faz o redirecionamento
$_SESSION['success'] = "Inscrição deletada com sucesso!";
header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
die();

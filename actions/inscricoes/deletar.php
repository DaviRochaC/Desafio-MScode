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
 



//variaveis
$id = intval($_GET['id']);
$inscricao = $inscricaoModel->buscarInscricaoPorId($id);
$endereco = $enderecoModel->buscarEnderecoPorId($inscricao['enderecos_id']);
$bairro = $bairroModel->buscarBairroPorId($endereco['bairros_id']);
$cidade = $cidadeModel->buscarCidadePorId($bairro['cidades_id']);
$estado = $estadoModel->buscarEstadoPorId($cidade['estados_id']);



//apagando inscrição
$deletarInscricao = $inscricaoModel->deletarInscricao($inscricao['id']);
$nomefoto = str_replace('http://localhost/mscode/desafio/views/img/','',$inscricao['foto']);
unlink('http://localhost/mscode/desafio/views/img/.'.$nomefoto);

//verificando se existe mais alguma inscricao vinculada ao endereco da inscricao apagada
$existeInscricao = $inscricaoModel->buscarInscricaoPorEnderecosId($endereco['id']);
if(!$existeInscricao){
$enderecoModel->deletarEndereco($endereco['id']);
}


//verificando se existe mais algum endereco vinculado ao bairro da inscricao apagada
$existeEndereco = $enderecoModel->buscarEndereçoPorBairrosId($bairro['id']);
if(!$existeEndereco){
  $bairroModel->deletarBairro($bairro['id']);
}

//verificando se existe mais algum bairro vinculado a cidade da inscricao apagada
$existeBairro = $bairroModel->buscarBairroPorCidadesId($cidade['id']);
if(!$existeBairro){
  $cidadeModel->deletarCidade($cidade['id']);
}

//verificando se existe mais alguma cidade vinculado ao estado da inscricao apagada
$existeCidade = $cidadeModel ->buscarCidadePorEstadosId($estado['id']);

if(!$existeCidade){
 
 $estadoModel->deletarEstado($estado['id']);
 
}


$_SESSION['success'] = "Inscrição deletada com sucesso!" ;
header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/listar.php');
die();












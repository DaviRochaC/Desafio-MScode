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


//verifica se os campos foram setados e sao diferentes de vazio
$inscricaoModel->verificaCampos($_POST, array(
    'nome', 'cpf', 'email', 'data_nascimento', 'cep', 'rua',
    'numero', 'bairro', 'cidade', 'estado',
));

$fotosetada = $inscricaoModel->verificafoto($_FILES['imagem']['name'], $_FILES['imagem']['size'],);


if (!$fotosetada) {
    $_SESSION['danger'] = 'Preencha todos os campos para prosseguir';
    header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
    die();
}

//tira os pontos e traço do cpf e do cep
$cpf = $inscricaoModel->limpacpf(htmlspecialchars($_POST['cpf']));
$cep = $inscricaoModel->limpacep(htmlspecialchars( $_POST['cep']));

//verifica se o cpf ou  email informado ja existe no banco. Se existir faz o redirecionamento
$cpfcadastrado = $inscricaoModel->buscarInscricaoPorCpf($cpf);
$emailcadastrado = $inscricaoModel->buscarInscricaoPorEmail(htmlspecialchars($_POST['email']),);

if ($cpfcadastrado) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao CPF informado';
    header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
    die();
}

if ($emailcadastrado) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao email informado';
    header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
    die();
}

//cadastra o estado e armazena ela em uma variavel
$arrayEstado = [
    'sigla' => htmlspecialchars($_POST['estado'])
];
$estado = $estadoModel->getEstado($arrayEstado['sigla']);

$arrayCidade = [
    'nome' => htmlspecialchars($_POST['cidade']),
    'estados_id' => $estado['id']
];

$cidade = $cidadeModel->getCidade($arrayCidade['nome'], $arrayCidade['estados_id']);


$arrayBairro = [
    'nome' => htmlspecialchars($_POST['bairro']),
    'cidades_id' => $cidade['id']
];

$bairro = $bairroModel->getBairro($arrayBairro['nome'], $arrayBairro['cidades_id']);


$complemento = htmlspecialchars($_POST['complemento']);

if (!isset($_POST['complemento']) or $_POST['complemento'] == '') {
    $complemento = null;
}

$arrayEndereço = [
    'rua' => htmlspecialchars($_POST['rua']),
    'numero' => htmlspecialchars($_POST['numero']),
    'cep' => $cep,
    'bairros_id' => $bairro['id'],
    'complemento' => $complemento
];

$endereco = $enderecoModel->getEndereco($arrayEndereço['rua'],$arrayEndereço['numero'],$arrayEndereço['cep'],$arrayEndereço['bairros_id'],$arrayEndereço['complemento']);

//salvar foto na pasta img


$imagem = $imagemModel->cadastrar($_FILES);
$urlimagem = 'http://localhost/mscode/desafio/views/img/'.$imagem ;

//cadastrar inscricao
$arrayInscricao = [
    'nome' => htmlspecialchars($_POST['nome']),
    'email' => htmlspecialchars($_POST['email']),
    'data_nascimento' => htmlspecialchars($_POST['data_nascimento']),
    'cpf' => $cpf,
    'foto' => $urlimagem,
    'enderecos_id' => $endereco['id'],
  ];

$inscricaoModel->create($arrayInscricao);

$_SESSION['success'] = ' Inscrição feita com sucesso!';
header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
die();



 

   
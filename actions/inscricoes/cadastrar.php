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


//instancias
$inscricaoModel = new Inscricao();
$imagemModel = new Imagem('../../views/img/', 'http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se', true, 5);
$estadoModel = new Estado();
$cidadeModel = new Cidade();
$bairroModel = new Bairro();
$enderecoModel = new Endereco();



//verifica se os campos foram setados e sao diferentes de vazio
$campoSetados = $inscricaoModel->verificaCampos($_POST, array(
    'nome', 'cpf', 'email', 'data_nascimento', 'cep', 'rua',
    'numero', 'bairro', 'cidade', 'estado',
));
if (!$campoSetados) {
    $_SESSION['danger'] = 'Preencha todos os campos para prosseguir';
    redirecionar();
}

//verifica se a foto foi setada e se nao estiver faz o redirecionamento
$fotosetada = $inscricaoModel->verificafoto($_FILES['imagem']['name'], $_FILES['imagem']['size'],);

if (!$fotosetada) {

    $_SESSION['danger'] = 'Preencha todos os campos para prosseguir';
    redirecionar();
}

//tira os pontos e traço do cpf e do cep
$cpf = $inscricaoModel->limpacpf(htmlspecialchars($_POST['cpf']));
$cep = $enderecoModel->limpacep(htmlspecialchars($_POST['cep']));

//verifica se o cpf ou  email informado ja existe no banco. Se existir faz o redirecionamento
$cpfcadastrado = $inscricaoModel->buscarInscricaoPorCpf($cpf);
$emailcadastrado = $inscricaoModel->buscarInscricaoPorEmail(htmlspecialchars($_POST['email']),);

if ($cpfcadastrado) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao CPF informado';
    redirecionar();
}

if ($emailcadastrado) {
    $_SESSION['danger'] = 'Já existe uma inscrição vinculada ao email informado';
    redirecionar();
}

// cria o array do estado,cadastra ele e o armazena em uma variavel
$arrayEstado = [
    'sigla' => htmlspecialchars($_POST['estado'])
];

$estado = $estadoModel->getEstado($arrayEstado['sigla']);

// cria o array da cidade,cadastra ela e a armazena em uma variavel
$arrayCidade = [
    'nome' => htmlspecialchars($_POST['cidade']),
    'estados_id' => $estado['id']
];

$cidade = $cidadeModel->getCidade($arrayCidade['nome'], $arrayCidade['estados_id']);

// cria o array do bairro,cadastra ele e o  armazena em uma variavel
$arrayBairro = [
    'nome' => htmlspecialchars($_POST['bairro']),
    'cidades_id' => $cidade['id']
];

$bairro = $bairroModel->getBairro($arrayBairro['nome'], $arrayBairro['cidades_id']);


//complemento recebendo o  input do POST 
$complemento = htmlspecialchars($_POST['complemento']);

// se o post nao veio setado ou se veio vazio o complemento recebe nulo
if (!isset($_POST['complemento']) or $_POST['complemento'] == '') {
    $complemento = null;
}

// cria o array do endereco,cadastra ele e o armazena em uma variavel
$arrayEndereço = [
    'rua' => htmlspecialchars($_POST['rua']),
    'numero' => htmlspecialchars($_POST['numero']),
    'cep' => $cep,
    'bairros_id' => $bairro['id'],
    'complemento' => $complemento
];

$endereco = $enderecoModel->getEndereco($arrayEndereço['rua'], $arrayEndereço['numero'], $arrayEndereço['cep'], $arrayEndereço['bairros_id'], $arrayEndereço['complemento']);


//salva foto na pasta img
$imagem = $imagemModel->cadastrar($_FILES);
$urlimagem = 'http://localhost/mscode/desafio/views/img/' . $imagem;

//criando o array da inscricao, cadastrando ela no banco e fazendo um redirecionamento com uma sessao success ligada
$arrayInscricao = [
    'nome' => htmlspecialchars($_POST['nome']),
    'email' => htmlspecialchars($_POST['email']),
    'data_nascimento' => htmlspecialchars($_POST['data_nascimento']),
    'cpf' => $cpf,
    'foto' => $urlimagem,
    'enderecos_id' => $endereco['id'],
    'landingpage' => ($_SESSION['admin_autenticado']) ? 0 : 1
];

$inscricaoModel->create($arrayInscricao);

$_SESSION['success'] = ' Inscrição feita com sucesso!';
redirecionar();



//funcoes
function redirecionar()
{
    if ($_SESSION['admin_autenticado']) {
        header('Location:http://localhost/mscode/desafio/views/admin/inscricoes/novaInscricao.php');
        die();
    }

    header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
    die();
}

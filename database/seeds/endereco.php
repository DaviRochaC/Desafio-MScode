<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//importações
require_once('../../models/Inscricao.php');
require_once('../../models/Estado.php');
require_once('../../models/Cidade.php');
require_once('../../models/Bairro.php');
require_once('../../models/Endereco.php');


//instancia
$inscricaoModel = new Inscricao();
$estadoModel = new Estado();
$cidadeModel = new Cidade();
$bairroModel = new Bairro();
$enderecoModel = new Endereco();

criarEstados();

for ($i = 0; $i < 5; $i++) {

    $estado = $estadoModel->buscarTodosEstados();
    $estado = $estado[rand(0, 26)];

    $arrayCidade = [
        'nome' => 'cidade do inscrito nº' . $i,
        'estados_id' => $estado['id']
    ];

    $cidadeModel->getCidade($arrayCidade['nome'], $arrayCidade['estados_id']);
    $cidade = $cidadeModel->buscarPorNomeEstadoId($arrayCidade['nome'], $arrayCidade['estados_id']);

    $arrayBairro = [
        'nome' => 'bairro do inscrito n' . $i,
        'cidades_id' => $cidade['id']
    ];

    $bairroModel->getBairro($arrayBairro['nome'], $arrayBairro['cidades_id']);
    $bairro = $bairroModel->buscarPorNomeCidadeId($arrayBairro['nome'], $arrayBairro['cidades_id']);
    

    $arrayEndereço = [
        'rua' => 'rua do inscrito nº' . $i,
        'numero' => rand(1, 100),
        'cep' => rand(11111111, 88888888),
        'bairros_id' => $bairro['id'],
        'complemento' => (rand(0, 1) > 0) ? 'casa' : null
    ];

 
    $endereco = $enderecoModel->getEndereco($arrayEndereço['rua'], $arrayEndereço['numero'], $arrayEndereço['cep'], $arrayEndereço['bairros_id'], $arrayEndereço['complemento']);
}





function criarEstados()
{

    $estados = array(
        "AC" => "Acre",
        "AL" => "Alagoas",
        "AM" => "Amazonas",
        "AP" => "Amapá",
        "BA" => "Bahia",
        "CE" => "Ceará",
        "DF" => "Distrito Federal",
        "ES" => "Espírito Santo",
        "GO" => "Goiás",
        "MA" => "Maranhão",
        "MT" => "Mato Grosso",
        "MS" => "Mato Grosso do Sul",
        "MG" => "Minas Gerais",
        "PA" => "Pará",
        "PB" => "Paraíba",
        "PR" => "Paraná",
        "PE" => "Pernambuco",
        "PI" => "Piauí",
        "RJ" => "Rio de Janeiro",
        "RN" => "Rio Grande do Norte",
        "RO" => "Rondônia",
        "RS" => "Rio Grande do Sul",
        "RR" => "Roraima",
        "SC" => "Santa Catarina",
        "SE" => "Sergipe",
        "SP" => "São Paulo",
        "TO" => "Tocantins"
    );

    foreach ($estados as $key => $estado) {
        (new Estado())->getEstado($key);
    }
}

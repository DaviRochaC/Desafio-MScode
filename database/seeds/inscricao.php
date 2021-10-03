<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//importações
require_once('../../models/Inscricao.php');
require_once('../../models/Endereco.php');
//instancia
$inscricaoModel = new Inscricao();
$enderecoModel = new Endereco();

$endereco = $enderecoModel->buscarTodosEnderecos();
$endereco = $endereco[rand(0, count($endereco) - 1)];

$imagens = [
    'https://www.redebrasilatual.com.br/wp-content/uploads/2021/09/lula-4.jpg',
    'https://t1.pb.ltmcdn.com/pt/posts/5/3/3/a_psicologia_das_cores_nas_fotos_de_perfil_335_1_600.jpg',
    'https://www.dci.com.br/wp-content/uploads/2020/09/20490-450x300.jpg',
    'https://pt-static.z-dn.net/files/d6c/8446475de4e6fc16ed82268a388516c7.jpg',
    'https://thumbs.dreamstime.com/z/retrato-do-perfil-das-pessoas-de-vinte-anos-do-homem-novo-no-muro-de-cimento-93379329.jpg',
    'https://static1.purepeople.com.br/articles/2/29/30/32/@/3315940-neymar-rebateu-a-afirmacao-de-flayslane-624x600-2.jpg',
    'https://jornaldacic.com.br/wp-content/uploads/2021/04/adolescente-alagoano-cria-perfil-no-instagram-com-boas-noticias-para-inspirar-as-pessoas-1617139282173_v2_900x506-1.jpg-1.jpg',
    'https://brasil.emeritus.org/wp-content/uploads/2020/01/gesta%CC%83o-de-pessoas-.jpg',
    'https://caliper.com.br/wp-content/uploads/2018/12/depoimento-inicial-mauricio.jpg',
    'https://pbs.twimg.com/media/EZhCo4zWsAMqFoa.jpg'
];
for ($i = 0; $i < 5; $i++) {

    $arrayInscricao = [
    'nome' => 'inscrito nº '.$i.' criado por seed',
    'email' => "inscrito$i@mail.com",
    'data_nascimento' => date('Y-m-d'),
    'cpf' => rand(11111111110,99999999990),
    'enderecos_id' => $endereco['id'],
    'foto' => $imagens[rand(0,count($imagens)-1)],
    'landingpage' => 0
  ];

    $inscricaoModel->create($arrayInscricao);

}


<?php

ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//importações de models para manipulação das classes
require_once('../../../models/Inscricao.php');
require_once('../../../models/Estado.php');
require_once('../../../models/Cidade.php');
require_once('../../../models/Bairro.php');
require_once('../../../models/Endereco.php');
require_once('../../../helpers/middleware.php');

//verificacao se o admin está logado 
verificaAdminLogado();


//instancias
$inscricaoModel = new Inscricao();
$estadoModel = new Estado();
$cidadeModel = new Cidade();
$bairroModel = new Bairro();
$enderecoModel = new Endereco();

//verificacao para receber alguem valido no GET['id']
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





?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Perfil - Administrativo</title>
  <link rel="icon" type="image/png" href="https://moveissimonetti.vteximg.com.br/arquivos/favicon.ico">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <!--script do Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!--script das mascaras -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
  <!--  Menu include -->
  <?php include('../components/menu.php') ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav include -->
    <?php include('../components/topnav.php') ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center">
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <a href="<?= $inscricao['foto'] ?>"> <img src="<?= $inscricao['foto'] ?> " alt="Image placeholder" class="card-img-top"></a>
          </div>
          <div class="card card-body">
            <div class="row">
              <div>
                <h2 class="text-dark text-center">
                  <?= $inscricao['nome'] ?>
                </h2>
              </div>
            </div>

          </div>

        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h2 class="mb-0">Informações</h2>
                </div>
                <div class="col-4 text-right">
                  <!-- Button do modal de editar inscrição -->
                  <?php if (!$inscricao['landingpage']) { ?>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar<?= $inscricao['id'] ?>">
                      Editar
                    </button>
                    <a href="../../../actions/inscricoes/deletar.php?id=<?= $inscricao['id'] ?>" class="btn btn-danger">Deletar</a>
                  <?php } ?>

                </div>
              </div>
            </div>
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <div class="row">
                  <?php include('../components/alerts.php') ?>
                  <h3 class="text-dark">Dados Pessoais</h3>

                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3"> Nome </strong> <br>
                      <?= $inscricao['nome'] ?>

                    </li>
                  </div>
                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Data Nascimento</strong> <br>
                      <?= date('d/m/Y', strtotime($inscricao['data_nascimento'])) ?>

                    </li>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Email</strong> <br>
                      <?= $inscricao['email'] ?>


                    </li>
                  </div>
                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3">CPF</strong> <br>
                      <?php $cpf = $inscricaoModel->formataCpf($inscricao['cpf']); ?>
                      <?= $cpf ?>

                    </li>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Criado_em</strong> <br>
                      <?= date('d/m/Y H:i', strtotime($inscricao['criado_em'])) ?>


                    </li>
                  </div>
                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Editado em</strong> <br>
                      <?= date('d/m/Y H:i', strtotime($inscricao['editado_em'])) ?>


                    </li>
                  </div>
                </div>

                <hr>

                <div class="row">
                  <h3 class="text-dark">Endereço</h3>
                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3"> Rua </strong> <br>
                      <?= $endereco['rua'] ?>

                    </li>
                  </div>
                  <div class="col-3">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Número</strong> <br>
                      <?= $endereco['numero'] ?>

                    </li>
                  </div>
                  <div class="col-3">
                    <li class="list-group-item">
                      <strong class="text-danger h3">CEP</strong> <br>
                      <?php $cep = $enderecoModel->formataCep($endereco['cep']) ?>
                      <?= $cep ?>

                    </li>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Bairro</strong> <br>
                      <?= $bairro['nome'] ?>
                    </li>
                  </div>
                  <div class="col-3">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Cidade</strong> <br>
                      <?= $cidade['nome'] ?>
                    </li>
                  </div>
                  <div class="col-3">
                    <li class="list-group-item">
                      <strong class="text-danger h3">Estado</strong> <br>
                      <?= $estado['sigla'] ?>
                    </li>
                  </div>
                </div>

                <?php if (isset($endereco['complemento']) and $endereco['complemento'] != '') { ?>
                  </li>
                  <div class="row">
                    <div class="col-6">
                      <li class="list-group-item">
                        <strong class="text-danger h3">Complemento</strong> <br>
                        <?= $endereco['complemento'] ?>
                      </li>
                    </div>
                  </div>
                <?php } ?>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>



    <!-- Modal de editar inscricao -->
    <div class="modal fade" id="editar<?= $inscricao['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="" id="exampleModalLabel">Editar <?= $inscricao['nome'] ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="../../../actions/inscricoes/editar.php" enctype="multipart/form-data">
              <h2 class="text-danger">Dados Pessoais</h2>
              <form>
                <div class="row">
                  <div class=" form-group col-md-5 col-sm-12">
                    <label class="form-label text-dark">Nome completo</label>
                    <input name="nome" class="form-control text-dark" type="text" value="<?= $inscricao['nome'] ?>">
                    <input name="id" type="hidden" value="<?= $inscricao['id'] ?>">
                  </div>

                  <div class=" form-group col-md-3 col-sm-12">
                    <label class="form-label text-dark">CPF</label>
                    <input name="cpf" class="form-control text-dark cpf" maxlength="14" type="text" value="<?= $inscricao['cpf'] ?>">
                  </div>
                  <div class=" form-group col-md-4 col-sm-12">
                    <label class="form-label text-dark">Data de Nascimento</label>
                    <input name="data_nascimento" class="form-control text-dark" type="date" value="<?= $inscricao['data_nascimento'] ?>">
                  </div>
                </div>

                <div class="row">
                  <div class=" form-group col-md-6 col-sm-12">
                    <label class="form-label text-dark">Email</label>
                    <input name="email" class="form-control text-dark" type="email" value="<?= $inscricao['email'] ?>">
                  </div>
                  <div class=" form-group col-md-6 col-sm-12">
                    <label class="form-label text-dark">Foto</label>
                    <input name="imagem" class="form-control text-dark" type="file" accept="image/* ">
                  </div>

                </div>

                <h2 class="pt-2 text-danger">Endereço</h2>

                <div class="row">
                  <div class=" form-group col-md-4 col-sm-12">
                    <label class="form-label text-dark">CEP</label>
                    <input name="cep" id="cep" class="form-control text-dark cep" maxlength="9" type="text" value="<?= $endereco['cep'] ?>">
                  </div>
                  <div class=" form-group col-md-6 col-sm-12">
                    <label class="form-label text-dark">Rua</label>
                    <input name="rua" id="rua" class="form-control text-dark" type="text" value="<?= $endereco['rua'] ?>">
                  </div>
                  <div class=" form-group col-md-2 col-sm-12">
                    <label class="form-label text-dark">Número</label>
                    <input name="numero" class="form-control text-dark" type="text" value="<?= $endereco['numero'] ?>">
                  </div>


                </div>

                <div class="row">
                  <div class=" form-group col-md-3 col-sm-12">
                    <label class="form-label text-dark">Bairro</label>
                    <input name="bairro" id="bairro" class="form-control text-dark" type="text" value="<?= $bairro['nome'] ?>">
                  </div>

                  <div class=" form-group col-md-4 col-sm-12">
                    <label class="form-label text-dark">Cidade</label>
                    <input name="cidade" id="cidade" class="form-control text-dark" type="text" value="<?= $cidade['nome'] ?>">
                  </div>
                  <div class=" form-group col-md-2 col-sm-12">
                    <label class="form-label text-dark">Estado</label>
                    <input name="estado" id="uf" class="form-control text-dark" type="text" maxlength="2" value="<?= $estado['sigla'] ?>">
                  </div>
                  <div class=" form-group col-md-3 col-sm-12">
                    <label class="form-label text-dark">Complemento</label>
                    <input name="complemento" class="form-control text-dark" type="text" value="<?= $endereco['complemento'] ?>">
                  </div>

                </div>

          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
          </div>
          </form>
        </div>
      </div>
    </div>




    <!-- Argon Scripts -->
    <!-- Core -->

    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>

    <!-- script da mascara pra cpf e cep -->
    <script>
      $(document).ready(function() {
        $('.cep').mask('00000-000');
        $('.cpf').mask('000.000.000-00', {
          reverse: true
        });
      });
    </script>

    <script>
      $(document).ready(function() {

        function limpa_formulário_cep() {
          // Limpa valores do formulário de cep.
          $("#rua").val("");
          $("#bairro").val("");
          $("#cidade").val("");
          $("#uf").val("");
          $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

          //Nova variável "cep" somente com dígitos.
          var cep = $(this).val().replace(/\D/g, '');

          //Verifica se campo cep possui valor informado.
          if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

              //Preenche os campos com "..." enquanto consulta webservice.
              $("#rua").val("...");
              $("#bairro").val("...");
              $("#cidade").val("...");
              $("#uf").val("...");
              $("#ibge").val("...");

              //Consulta o webservice viacep.com.br/
              $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                  //Atualiza os campos com os valores da consulta.
                  $("#rua").val(dados.logradouro);
                  $("#bairro").val(dados.bairro);
                  $("#cidade").val(dados.localidade);
                  $("#uf").val(dados.uf);
                  $("#ibge").val(dados.ibge);
                } //end if.
                else {
                  //CEP pesquisado não foi encontrado.
                  limpa_formulário_cep();
                  alert("CEP não encontrado.");
                }
              });
            } //end if.
            else {
              //cep é inválido.
              limpa_formulário_cep();
              alert("Formato de CEP inválido.");
            }
          } //end if.
          else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
          }
        });
      });
    </script>
</body>

</html>
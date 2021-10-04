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

verificaAdminLogado();


//instancias
$inscricaoModel = new Inscricao();
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





?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Perfil</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="../../inscricoes/assets/js/jquery.mask.js"></script>

</head>

<body>
  <!-- Sidenav -->
  <?php include('../components/menu.php') ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
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
            <img src="../assets/img/code.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="<?= $inscricao['foto'] ?>">
                    <img widht="200 px" src="<?= $inscricao['foto'] ?>" class="">
                  </a>
                </div>
              </div>
            </div>

            <div class="card-body pt-6">
              <div class="row">
                <div class="col-12">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <h3 class="h3">
                        <?= $inscricao['nome'] ?><span class="font-weight-light"></span>
                      </h3>
                    </div>
                  </div>
                </div>
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
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar<?= $inscricao['id'] ?>">
                    Editar
                  </button>
                  <a href="../../../actions/inscricoes/deletar.php?id=<?= $inscricao['id'] ?>" class="btn btn-danger">Deletar</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <div class="row">
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
            <form method="POST" action="../../../actions/inscricoes/editar.php">
              <h2 class="text-danger">Dados Pessoais</h2>
              <form>
                <div class="row">
                  <div class=" form-group col-md-5 col-sm-12">
                    <label class="form-label text-dark">Nome completo</label>
                    <input name="nome" class="form-control text-dark" type="text" value="<?= $inscricao['nome'] ?>">
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
                  <div class=" form-group col-md-6 col-sm-12">
                    <label class="form-label text-dark">Rua</label>
                    <input name="rua" class="form-control text-dark" type="text" value="<?= $endereco['rua'] ?>">
                  </div>
                  <div class=" form-group col-md-2 col-sm-12">
                    <label class="form-label text-dark">Número</label>
                    <input name="numero" class="form-control text-dark" type="text" value="<?= $endereco['numero'] ?>">
                  </div>
                  <div class=" form-group col-md-4 col-sm-12">
                    <label class="form-label text-dark">CEP</label>
                    <input name="cep" class="form-control text-dark cep" maxlength="9" type="text" value="<?= $endereco['cep'] ?>">
                  </div>

                </div>

                <div class="row">
                  <div class=" form-group col-md-3 col-sm-12">
                    <label class="form-label text-dark">Bairro</label>
                    <input name="bairro" class="form-control text-dark" type="text" value="<?= $bairro['nome'] ?>">
                  </div>

                  <div class=" form-group col-md-4 col-sm-12">
                    <label class="form-label text-dark">Cidade</label>
                    <input name="cidade" class="form-control text-dark" type="text" value="<?= $cidade['nome'] ?>">
                  </div>
                  <div class=" form-group col-md-2 col-sm-12">
                    <label class="form-label text-dark">Estado</label>
                    <input name="estado" class="form-control text-dark" type="text" maxlength="2" value="<?= $estado['sigla'] ?>">
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

    <script>
      $(document).ready(function() {
        $('.cep').mask('00000-000');
        $('.cpf').mask('000.000.000-00', {
          reverse: true
        });
      });
    </script>
</body>

</html>
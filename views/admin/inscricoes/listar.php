<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//imports
require_once('../../../models/Inscricao.php');

//instancias
$inscricaoModel = new Inscricao();

//variaveis
$inscricoes = $inscricaoModel->buscarTodasInscricoes();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Inscricoes - Administrativo</title>
  <!-- Favicon -->

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <?php include('../components/menu.php'); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include('../components/topnav.php'); ?>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-danger pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h2 class="h2 text-white d-inline-block mb-0">Inscrições</h2>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col ">
          <div class="card ">

            <!-- Light table -->
            <div class="card-body">
              <?php include('../components/alerts.php')?>
              <div class="table-responsive border-0">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Imagem</th>
                      <th scope="col" class="sort" data-sort="name">Nome</th>
                      <th scope="col" class="sort" data-sort="budget">Email</th>
                      <th scope="col" class="sort" data-sort="status">CPF</th>
                      <th scope="col" class="sort" data-sort="completion">Ações</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <?php foreach($inscricoes as $inscricao) { ?>
                      <tr>
                        <td><img width="100px" src ="<?= $inscricao['foto']?>"></td>
                        <td><?= $inscricao['nome']; ?></td>
                        <td><?= $inscricao['email']; ?></td>
                        <td><?= $inscricao['cpf']; ?></td>
                        <td><a class="btn btn-primary" href="http://localhost/mscode/desafio/views/admin/inscricoes/perfil.php?id=<?= $inscricao['id']?>"> Detalhes</a>
                           
                        </td>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
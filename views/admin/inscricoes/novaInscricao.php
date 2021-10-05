<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

//imports
require_once('../../../models/Inscricao.php');
require_once('../../../helpers/middleware.php');

verificaAdminLogado();

//instancias
$inscricaoModel = new Inscricao();



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Nova Inscrição - Administrativo</title>
    <!-- Favicon -->

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
                            <h2 class=" text-white d-inline-block mb-0"> Nova Inscrição</h2>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="card shadow">

                    <div class="card-body">
                        <?php include('../components/alerts.php') ?>
                        <h2 class="text-danger">Dados Pessoais</h2>

                        <form method="POST" action="../../../actions/inscricoes/cadastrar.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class=" form-group col-md-5 col-sm-12">
                                    <label class="form-label text-dark">Nome completo</label>
                                    <input name="nome" class="form-control" type="text">
                                </div>

                                <div class=" form-group col-md-3 col-sm-12">
                                    <label class="form-label text-dark">CPF</label>
                                    <input name="cpf" class="form-control cpf" maxlength="14" type="text">
                                </div>
                                <div class=" form-group col-md-4 col-sm-12">
                                    <label class="form-label text-dark">Data de Nascimento</label>
                                    <input name="data_nascimento" class="form-control" type="date" maxlength="8">
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-6 col-sm-12">
                                    <label class="form-label text-dark">Email</label>
                                    <input name="email" class="form-control" type="email">
                                </div>
                                <div class=" form-group col-md-6 col-sm-12">
                                    <label class="form-label text-dark">Foto</label>
                                    <input name="imagem" class="form-control" type="file" accept="image/* ">
                                </div>

                            </div>

                            <h2 class="pt-2 text-danger">Endereço</h2>

                            <div class="row">
                                <div class=" form-group col-md-6 col-sm-12">
                                    <label class="form-label text-dark">Rua</label>
                                    <input name="rua" class="form-control" type="text">
                                </div>
                                <div class=" form-group col-md-2 col-sm-12">
                                    <label class="form-label text-dark">Número</label>
                                    <input name="numero" class="form-control" type="text">
                                </div>
                                <div class=" form-group col-md-4 col-sm-12">
                                    <label class="form-label text-dark">CEP</label>
                                    <input name="cep" class="form-control cep" maxlength="9" type="text">
                                </div>

                            </div>

                            <div class="row">
                                <div class=" form-group col-md-3 col-sm-12">
                                    <label class="form-label text-dark">Bairro</label>
                                    <input name="bairro" class="form-control" type="text">
                                </div>

                                <div class=" form-group col-md-4 col-sm-12">
                                    <label class="form-label text-dark">Cidade</label>
                                    <input name="cidade" class="form-control" type="text">
                                </div>
                                <div class=" form-group col-md-2 col-sm-12">
                                    <label class="form-label text-dark">Estado</label>
                                    <input name="estado" class="form-control" type="text" maxlength="2">
                                </div>
                                <div class=" form-group col-md-3 col-sm-12">
                                    <label class="form-label text-dark">Complemento</label>
                                    <input name="complemento" class="form-control" type="text">
                                </div>

                            </div>

                            <div class="row pt-3">
                                <button class="btn btn-success btn-block" type="submit">ENVIAR</button>
                            </div>
                    </div>


                </div>

                </form>
                <hr>









                </form>

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
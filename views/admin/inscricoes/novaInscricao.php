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

    <!--script do Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--script das mascaras -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                                    <input name="nome" class="form-control text-dark" type="text">
                                </div>

                                <div class=" form-group col-md-3 col-sm-12">
                                    <label class="form-label text-dark">CPF</label>
                                    <input name="cpf" class="form-control text-dark cpf" maxlength="14" type="text">
                                </div>
                                <div class=" form-group col-md-4 col-sm-12">
                                    <label class="form-label text-dark">Data de Nascimento</label>
                                    <input name="data_nascimento" class="form-control text-dark" type="date" maxlength="8">
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-6 col-sm-12">
                                    <label class="form-label text-dark">Email</label>
                                    <input name="email" class="form-control text-dark" type="email">
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
                                    <input name="cep" id="cep" class="form-control text-dark cep" maxlength="9" type="text">
                                </div>
                                <div class=" form-group col-md-6 col-sm-12">
                                    <label class="form-label text-dark">Rua</label>
                                    <input name="rua" id="rua" class="form-control text-dark" type="text">
                                </div>
                                <div class=" form-group col-md-2 col-sm-12">
                                    <label class="form-label text-dark">Número</label>
                                    <input name="numero" class="form-control text-dark" type="text">
                                </div>


                            </div>

                            <div class="row">
                                <div class=" form-group col-md-3 col-sm-12">
                                    <label class="form-label text-dark">Bairro</label>
                                    <input name="bairro" id="bairro" class="form-control text-dark" type="text">
                                </div>

                                <div class=" form-group col-md-4 col-sm-12">
                                    <label class="form-label text-dark">Cidade</label>
                                    <input name="cidade" id="cidade" class="form-control text-dark" type="text">
                                </div>
                                <div class=" form-group col-md-2 col-sm-12">
                                    <label class="form-label text-dark">Estado</label>
                                    <input name="estado" id="uf" class="form-control text-dark" type="text" maxlength="2">
                                </div>
                                <div class=" form-group col-md-3 col-sm-12">
                                    <label class="form-label text-dark">Complemento</label>
                                    <input name="complemento" class="form-control text-dark" type="text">
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
<?php

ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>MScode: Inscricões</title>
    <!-- Favicon  da Simonetti-->
    <link rel="icon" type="image/png" href="https://moveissimonetti.vteximg.com.br/arquivos/favicon.ic">o
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./assets/css/styles.css" rel="stylesheet" />
   <!--script do Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--script das mascaras -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <img width="170 px" src="./assets//img/logo.png" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#sobre">Sobre</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded btn btn-danger" href="#inscreva-se"><strong>INSCREVA-SE</strong></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-white text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <div class="row">
                <div class="col-5">
                    <img width="600 px" src="./assets/img/BUG.png" alt="">
                </div>

                <div class="col-7 ">
                    <h1 class="text-center text-end text-dark"><strong class="text-danger">MSCODE</strong>
                        <div class="divider-custom divider-dark">
                            <div class="divider-custom-line "></div>
                        </div>
                        Sua melhor oportunidade <br> de entrar no universo da <strong class="text-danger">PROGRAMAÇÃO</strong>!!!
                    </h1>
                </div>
            </div>

        </div>
    </header>

    <!-- Sobre Section-->
    <section class="page-section bg-dark text-white mb-0" id="sobre">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Sobre o MScode</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div style="text-align:justify;" class="col-md-5 col-sm-12 ">
                    <div class="row">
                        <h5 class="text-center text-danger">Móveis Simonetti</h5>
                        <p> A Móveis Simonetti é uma rede varejista, fundada em 15 de abril de 1988, no município de Pinheiros-ES, por Sr. Dilmar Antônio Simonetti. Hoje a empresa atua em quase todo o Espírito Santo, além de possuir diversas lojas em cidades do sul da Bahia e noroeste de Minas Gerais.</p>
                        <h5 class="text-center text-danger ">MScode</h5>
                        <p>O MScode é um programa de formação de desenvolvedores web, criado pela empresa Móveis Simonetti em parceira com o SENAC (Serviço Nacional de Aprendizagem Comercial).</p>

                        <h5 class="text-center text-danger pt-4">Por que entrar no MScode?</h5>
                        <p>O MScode pode abrir oportunidades para você no mercado de trabalho da Tecnologia da Informação. Nosso método de ensino é voltado aos casos práticos do desenvolvimento tecnológico,
                            contando com profissionais capacitados auxiliando você nessa nova jornada da <strong class="text-danger">PROGRAMAÇÃO</strong>.
                        </p>
                    </div>

                </div>
                <div class="col-md-7 col-sm-12">
                    <img width="680 px" class="" src="./assets/img/learning.png" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- Inscricão Section-->
    <section class="page-section" id="inscreva-se">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img width="300 px " src="./assets/img/programming.png" alt="">

                </div>

                <div class="col-md-8 col-sm-12">
                    <!-- Inscricão Section Heading-->
                    <!-- Formulário Inscricão Section -->
                    <div class="row justify-content-center  ">

                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-danger mb-0">Venha conosco</h2>

                        <div class="pt-3 text-center">
                            <h5>Preencha o formulário com as informações necessárias <br>
                                e concorra a uma vaga no time do <strong class="text-danger">MScode</strong>!!!</h5>

                        </div>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                        </div>

                        <div class="card shadow ">
                            <div class="card-body pt-5 ">
                                <h5><?php include('../admin/components/alerts.php') ?></h5>
                                <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST" action="../../actions/inscricoes/cadastrar.php" enctype="multipart/form-data">
                                    <div class="row">

                                        <h4 class="text-center pt-2">Dados Pessoais</h4>
                                        <div class=" form-group col-md-5 col-sm-12">
                                            <label class="form-label">Nome completo</label>
                                            <input name="nome" class="form-control" type="text">
                                        </div>

                                        <div class=" form-group col-md-3 col-sm-12">
                                            <label class="form-label">CPF</label>
                                            <input name="cpf" class="form-control cpf" maxlength="14" type="text">
                                        </div>
                                        <div class=" form-group col-md-4 col-sm-12">
                                            <label class="form-label">Data de Nascimento</label>
                                            <input name="data_nascimento" class="form-control" type="date" maxlength="10">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class=" form-group col-md-6 col-sm-12">
                                            <label class="form-label">Email</label>
                                            <input name="email" class="form-control" type="email">
                                        </div>
                                        <div class=" form-group col-md-6 col-sm-12">
                                            <label class="form-label">Foto</label>
                                            <input name="imagem" class="form-control" type="file" accept="image/* ">
                                        </div>

                                    </div>
                                    <hr>
                                    <h4 class="pt-3 text-center">Endereço</h4>

                                    <div class="row">
                                        <div class=" form-group col-md-4 col-sm-12">
                                            <label class="form-label">CEP</label>
                                            <input name="cep" id="cep" class="form-control cep" maxlength="9" type="text">
                                        </div>
                                        <div class=" form-group col-md-6 col-sm-12">
                                            <label class="form-label">Rua</label>
                                            <input name="rua" id="rua" class="form-control" type="text">
                                        </div>
                                        <div class=" form-group col-md-2 col-sm-12">
                                            <label class="form-label">Número</label>
                                            <input name="numero" class="form-control" type="text">
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-3 col-sm-12">
                                            <label class="form-label">Bairro</label>
                                            <input name="bairro" id="bairro" class="form-control" type="text">
                                        </div>

                                        <div class=" form-group col-md-4 col-sm-12">
                                            <label class="form-label">Cidade</label>
                                            <input name="cidade" id="cidade" class="form-control" type="text">
                                        </div>
                                        <div class=" form-group col-md-2 col-sm-12">
                                            <label class="form-label">Estado</label>
                                            <input name="estado" id="uf" class="form-control" type="text" maxlength="2">
                                        </div>
                                        <div class=" form-group col-md-3 col-sm-12">
                                            <label class="form-label">Complemento</label>
                                            <input name="complemento" class="form-control" type="text">
                                        </div>

                                    </div>

                                    <div class="row pt-3">
                                        <button class="btn btn-success btn-block" type="submit">ENVIAR</button>
                                    </div>

                            </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white bg-dark">
        <div class="container"> Davi Rocha - Mscode <small> &copy; 2021</small></div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>


    <!--script da mascaras de cep e cpf -->
    <script>
        $(document).ready(function() {
            $('.cep').mask('00000-000');
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
        });
    </script>

    <!--script do autocomplete do cep para os demais outros campos -->
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
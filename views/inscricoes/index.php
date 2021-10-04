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
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./assets/css/styles.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="./assets/js/jquery.mask.js"></script>
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
                    <img width="500 px" src="./assets/img/if .png" alt="">
                </div>

                <div class="col-7 ">
                    <h1 class="text-center text-end text-dark"><strong class="text-danger">MSCODE</strong>
                        <div class="divider-custom divider-dark">
                            <div class="divider-custom-line"></div>
                        </div>
                        Sua melhor oportunidade <br> de entrar no universo da <strong class="text-danger">PROGRAMAÇÃO</strong>!!!
                    </h1>
                </div>
            </div>



            <!-- Masthead Heading-->
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
                <div class="col-md-5 col-sm-12 ">
                    <div class="row">
                        <h5 class="text-center text-danger">Móveis Simonetti</h5>
                        <p> A Móveis Simonetti é uma rede varejista, fundada em Pinheiros em 15 de abril de 1988, por Sr. Dilmar Antônio Simonetti, que hoje atua em quase todo o Espírito Santo, além de possuir diversas lojas em cidades do sul da Bahia e noroeste de Minas Gerais.</p>
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
                                            <input name="data_nascimento" class="form-control" type="date">
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
                                        <div class=" form-group col-md-6 col-sm-12">
                                            <label class="form-label">Rua</label>
                                            <input name="rua" class="form-control" type="text">
                                        </div>
                                        <div class=" form-group col-md-2 col-sm-12">
                                            <label class="form-label">Número</label>
                                            <input name="numero" class="form-control" type="text">
                                        </div>
                                        <div class=" form-group col-md-4 col-sm-12">
                                            <label class="form-label">CEP</label>
                                            <input name="cep" class="form-control cep" maxlength="9" type="text">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-3 col-sm-12">
                                            <label class="form-label">Bairro</label>
                                            <input name="bairro" class="form-control" type="text">
                                        </div>

                                        <div class=" form-group col-md-4 col-sm-12">
                                            <label class="form-label">Cidade</label>
                                            <input name="cidade" class="form-control" type="text">
                                        </div>
                                        <div class=" form-group col-md-2 col-sm-12">
                                            <label class="form-label">Estado</label>
                                            <input name="estado" class="form-control" type="text" maxlength="2">
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
        <div class="container"><small>Copyright &copy; 2021</small></div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

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
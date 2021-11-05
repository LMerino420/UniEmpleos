<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UNIEMPLEOS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cuprum">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">>

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(''); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(''); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(''); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(''); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(''); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(''); ?>assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/project-card.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/Profile-Card-Slider---Slick-Slider.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">


    <!-- =======================================================
  * Template Name: Scaffold - v4.3.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        .nv {
            transition: background-color .5s;
        }

        .nv:hover {
            background-color: #989797;
        }

        .postu {
            transition: background-color 1s;
        }

        .postu:hover {
            background-color: #000;
        }

        label,
        h2 {
            font-family: Cuprum, sans-serif;
        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex ">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="<?php echo base_url("index.php/Control/index"); ?>">UniEmpleos</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" class="nav-link nv" href="<?= $_SERVER["HTTP_REFERER"] ?>">Regresar</a></li>
                    <li><a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" class="nav-link nv" href="<?php echo base_url("index.php/Control/VistaCandidato"); ?>">Empresas registradas</a></li>
                    <?php if ($this->session->userdata('login')) { ?>
                        <li class="dropdown">
                            <a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" href="#">
                                <?php if ($this->session->userdata('login')) { ?>

                                    <?php if ($this->session->userdata('idtipo') == 1) { ?>
                                        <i class="bi bi-person-fill"></i>
                                    <?php } else { ?>
                                        <i class="bi bi-building"></i>
                                    <?php } ?>
                                    <span>
                                        <?php echo $this->session->userdata('usuario') ?>
                                    </span>
                                    <i class="bi bi-chevron-down"></i>
                                <?php } ?>
                            </a>

                            <ul style="background-color:#989797">

                                <?php if ($this->session->userdata('login')) { ?>
                                    <?php if ($this->session->userdata('idtipo') == 1) { ?>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/MiPerfil"); ?>">Mi perfil</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/ProgresoPostu"); ?>">Mis postulaciones</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Log_out"); ?>">Cerrar sesión</a></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>

                        </li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" href="#">
                                <span>
                                    Opciones
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul style="background-color:#989797">
                                <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Login"); ?>">Iniciar sesión</a></li>
                                <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/RegCandidato"); ?>">Nuevo candidato</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-down">
                <br><br>
                <h2 style="font-family: Cuprum, sans-serif;">¡Vacantes publicadas!</h2>
                <p></p>
            </div>

            <?php if (isset($_SESSION['MSJ_POSTU'])) { ?>
                <div class="alert alert-info alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $_SESSION['MSJ_POSTU']; ?></div>
            <?php } ?>

            <div class="row">
                <?php foreach ($getPublicVacante as $dtVacante) { ?>

                    <div class="col-lg-6">

                        <ul class="nav-tabs flex-column">

                            <li class="nav-item" data-aos="fade-up">

                                <a class="nav-link active show" data-bs-toggle="tab">
                                    <div class="float-right" style="margin : 15px;text-align: center">
                                        <img src="<?php echo base_url('') ?>imgCateg/<?php echo $dtVacante->img; ?>" width="150px" style="padding:10px;">
                                        <br><strong>
                                            <font><?php echo $dtVacante->n_categoria; ?></font>
                                        </strong>
                                    </div>
                                    <h4><?php echo $dtVacante->n_vacante; ?></h4>
                                    <h6><?php echo $dtVacante->contrato; ?></h6>
                                    <p style="color: black;">
                                        <strong>Horario:&nbsp;</strong>
                                        <?php echo substr("$dtVacante->entrada", 0, -3) ?> - <?php echo substr("$dtVacante->salida", 0, -3) ?>
                                    </p>
                                    <p style="text-align: justify; color: black;"><strong>Descripción:&nbsp;</strong><br><?php echo $dtVacante->des_vacante; ?></p>
                                    <p style="text-align: justify; color: black;;"><strong>Requerimientos:&nbsp;</strong><br><?php echo $dtVacante->requerimiento; ?></p><br>
                                    <h5 style="text-align: right;"><i class="fa fa-usd"></i>&nbsp;<?php echo $dtVacante->salario; ?></h5>
                                </a>
                                <br>
                                <h6 class="postu" style="text-align: center;">

                                    <?php if ($this->session->userdata('login')) { ?>
                                        <a href="<?php echo base_url('') ?>index.php/control/insert_postulacion/<?php echo $dtVacante->idvacante; ?>/<?php echo $dtVacante->idempresa; ?>">
                                            <strong>Postularme</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a href="#" onClick="alert('Inicia sesion o registrate para poder postularte a esta vacante')">
                                            <strong>Postularme</strong>
                                        </a>
                                    <?php } ?>

                                </h6>
                                <br>
                            </li>

                        </ul>

                    </div>
                <?php } ?>
            </div>

        </div>
    </section><!-- End Features Section -->

    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>UniEmpleos</span></strong>. Todos los derechos reservados
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(''); ?>assets/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url(''); ?>assets/js/main.js"></script>

    <script src="<?php echo base_url('') ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url('') ?>assets/js/bs-init.js"></script>
    <script src="<?php echo base_url('') ?>assets/js/style.js"></script>

</body>

</html>
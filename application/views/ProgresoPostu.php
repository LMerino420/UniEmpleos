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
        .alert {
            background-color: #B0D8FF;
            border-radius: 5px;
            color: white;
        }

        .closebtn {
            color: white;
            cursor: pointer;
        }

        .closebtn:hover {
            color: black;
        }

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

    <script>
        function soloLetras(e) {
            var key = e.keyCode || e.which,
                tecla = String.fromCharCode(key).toLowerCase(),
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
                especiales = [8, 37, 39, 46],
                tecla_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }
        }
    </script>

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
                    <li><a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" class="nav-link nv" href="<?=$_SERVER["HTTP_REFERER"]?>">Regresar</a></li>
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
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Log_out"); ?>">Cerrar sesión</a></li>
                                    <?php } else { ?>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/RegVacante"); ?>">Registrar vacante</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/ProgresoPostu"); ?>">Vacantes publicadas</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Log_out"); ?>">Cerrar sesión</a></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>

                        </li>
                    <?php } else { ?>
                        <li>
                            <a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" class="nav-link nv" href="<?php echo base_url("index.php/Control/Login"); ?>">Iniciar sesión</a>
                        </li>
                    <?php } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-down">
                <br><br>
                <h2 style="font-family: Cuprum, sans-serif;">¡Progreso de mis postulaciones!</h2>
                <p></p>
            </div>

            <?php foreach ($getPostulacion as $dtPostu) { ?>
                <div id="msform">
                    <strong style="font-family: Cuprum, sans-serif; font-size: 25px;"><?php echo $dtPostu->n_vacante; ?></strong><br>
                    <font style="font-family: Cuprum, sans-serif;font-size: 23px;"><?php echo $dtPostu->nombre; ?></font><br><br>
                    <ul id="progressb">
                        <li class="<?php if ($dtPostu->postular == 1) {
                                        echo 'active';
                                    } ?>" id="inscrito" style="font-family: Cuprum, sans-serif;"><strong>Inscrito</strong></li>
                        <li class="<?php if ($dtPostu->revision == 1) {
                                        echo 'active';
                                    } ?>" id="cv_visto" style="font-family: Cuprum, sans-serif;"><strong>CV en revision</strong></li>
                        <li class="<?php if ($dtPostu->entrevista == 1) {
                                        echo 'active';
                                    } ?>" id="finalizado" style="font-family: Cuprum, sans-serif;"><strong>Proceso finalizado</strong></li>
                    </ul>
                </div>
                <br><br>
            <?php } ?>
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
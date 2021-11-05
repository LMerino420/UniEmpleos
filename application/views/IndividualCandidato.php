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


    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/project-card.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/Profile-Card-Slider---Slick-Slider.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/perfilCnd.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

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

        h2 {
            font-family: Cuprum, sans-serif;
        }

        .profile-user-details-label,
        .profile-user-details-value,
        .profile-label,
        .btn {
            font-family: Cuprum, sans-serif;
            font-size: 19px;
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
                                    <?php if ($this->session->userdata('idtipo') == 2) { ?>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/PerfilEmp"); ?>">Mi Perfil</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/RegVacante"); ?>">Registrar vacante</a></li>
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

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

            <div data-aos="slide-right">


                <div class="container bootstrap snippets bootdeys">
                    <div class="row" id="user-profile">
                        <div class="col-lg-3 col-md-4">
                            <div class="main-box clearfix">
                                <h2><?php echo $perfilCand->nombre ?></h2>
                                <img alt="" class="profile-img img-responsive center-block" src="<?php echo base_url(''); ?>fotoCnd/<?php echo $perfilCand->foto_cnd ?>" style="width: 100%;">
                                <div class="profile-label">
                                    <span><?php echo $perfilCand->n_categoria ?></span>
                                </div>

                                <!-- REDES SOCIALES -->
                                <!-- <div class="profile-details">
                                    <ul class="fa-ul">
                                        <li><i class="fa-li fa fa-truck"></i>Orders: <span>456</span></li>
                                        <li><i class="fa-li fa fa-comment"></i>Posts: <span>828</span></li>
                                        <li><i class="fa-li fa fa-tasks"></i>Tasks done: <span>1024</span></li>
                                    </ul>
                                </div> -->

                                <div class="profile-message-btn center-block text-center">
                                    <a href="<?php echo base_url('') ?>cvCandidatos/<?php echo $perfilCand->pdf_cv; ?>" class="btn btn-success">
                                        <font color="black">Ver CV &nbsp;</font><i class="fa fa-file-o"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8">
                            <div class="main-box clearfix">

                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-user"></i>&emsp;Generales:</h2>
                                        </div>
                                    </div>
                                    <div class=" profile-user-info">
                                        <div class="col-sm-8">
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Nombres
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->nombre ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Apellidos
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->apellido ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Nacimiento
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->nacimiento ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Correo
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->correo ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Telefono
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->c_telefono ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Universidad
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->n_universidad ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Facultad
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->n_facultad ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Carrera
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->n_carrera ?>
                                                </div>
                                            </div>
                                            <div class="profile-user-details ">
                                                <div class="profile-user-details-label">
                                                    Ciclo
                                                </div>
                                                <div class="profile-user-details-value">
                                                    <?php echo $perfilCand->ciclo ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-link"></i>&emsp;Repositorio:</h2>
                                        </div>
                                    </div>

                                    <?php foreach ($repCand as $repo) { ?>
                                        <div class="profile-user-details-label">
                                            <i class="fa fa-github" style="font-size: 1.2em;"></i>
                                            <strong>Link:&ensp;<a href="<?php echo $repo->enlace ?>"><?php echo $repo->enlace ?></a></strong>
                                        </div>
                                        <div class="profile-user-details-value" style="border: black;">
                                            <?php echo $repo->rep_descrip ?>
                                        </div><br>
                                    <?php } ?>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section><!-- End Services Section -->

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
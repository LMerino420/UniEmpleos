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
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/txt_edit.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/perfilCnd.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- //TRABAJANDO -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

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

        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .my-select {
            background-color: #3a66b7;
            color: white;
            border: 0 none;
            border-radius: 20px;
            padding: 6px 20px;
        }
    </style>

    <script>
        $(function() {
            $("#id_categoria").change(function() {
                if ($(this).val() === "1") {
                    $("#lbl_tel").prop("hidden", false);
                    $("#txt_tel").prop("hidden", true);
                    $("#lbl_txt_tel").prop("hidden", true);

                    $("#lbl_correo").prop("hidden", false);
                    $("#txt_correo").prop("hidden", true);
                    $("#lbl_txt_correo").prop("hidden", true);

                    $("#id_input4").prop("hidden", true);
                } else {
                    $("#lbl_tel").prop("hidden", true);
                    $("#txt_tel").prop("hidden", false);
                    $("#lbl_txt_tel").prop("hidden", false);

                    $("#lbl_correo").prop("hidden", true);
                    $("#txt_correo").prop("hidden", false);
                    $("#lbl_txt_correo").prop("hidden", false);

                    $("#id_input4").prop("hidden", false);
                }
            });
        });
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
                                    <?php if ($this->session->userdata('idtipo') == 2) { ?>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/RegVacante"); ?>">Registrar vacante</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Log_out"); ?>">Cerrar sesi??n</a></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>

                        </li>
                    <?php } else { ?>
                        <li>
                            <a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" class="nav-link nv" href="<?php echo base_url("index.php/Control/Login"); ?>">Iniciar sesi??n</a>
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


                    <select class="custom-select my-select" name='id_categoria' id='id_categoria'>
                        <option value="1" selected>Opciones de perfil</option>
                        <option value="2">Editar</option>
                    </select>

                    <div class="row" id="user-profile">
                        <!-- <?php
                        if (isset($_SESSION['MSJ_UPD_USR'])) {
                        ?>
                            <div class="alert alert-info alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $_SESSION['MSJ_UPD_USR']; ?></div>
                        <?php
                        }
                        ?> -->
                        <div class="col-lg-3 col-md-4">
                            <div class="main-box clearfix">
                                <h2><?php echo $getEmpresa->nombre ?></h2>
                                <img alt="" class="profile-img img-responsive center-block" src="<?php echo base_url(''); ?>logEmpresa/<?php echo $getEmpresa->foto_emp ?>" style="width: 100%;">
                                <div class="profile-label">
                                    <span><strong>Representante:<br></strong><?php echo $getEmpresa->representante ?></span>
                                </div>

                                <!-- REDES SOCIALES -->
                                <!-- <div class="profile-details">
                                    <ul class="fa-ul">
                                        <li><i class="fa-li fa fa-truck"></i>Orders: <span>456</span></li>
                                        <li><i class="fa-li fa fa-comment"></i>Posts: <span>828</span></li>
                                        <li><i class="fa-li fa fa-tasks"></i>Tasks done: <span>1024</span></li>
                                    </ul>
                                </div> -->

                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8">
                            <div class="main-box clearfix">
                                <div>

                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-user"></i>&ensp;Generales:</h2>
                                        </div>
                                    </div>
                                    <div class=" profile-user-info">
                                        <div class="col-sm-8">
                                            <form method="POST" action="<?php echo base_url('') ?>index.php/Control/Upd_PerfilEmp">
                                                <div class="profile-user-details ">
                                                    <div class="profile-user-details-label">
                                                        Empresa
                                                    </div>
                                                    <div class="profile-user-details-value">
                                                        <?php echo $getEmpresa->nombre ?>
                                                    </div>
                                                </div>
                                                <div class="profile-user-details ">
                                                    <div class="profile-user-details-label">
                                                        Telefono
                                                    </div>
                                                    <div class="profile-user-details-value">
                                                        <div class="field">
                                                            <input type="input" class="form__field" placeholder="<?php echo $getEmpresa->telefono ?>" name="txt_tel" id="txt_tel" hidden />
                                                            <label for="txt_tel" class="form__label" id="lbl_txt_tel" hidden><?php echo $getEmpresa->telefono ?></label>
                                                        </div>
                                                        <label id="lbl_tel"><?php echo $getEmpresa->telefono ?></label>
                                                    </div>
                                                </div>
                                                <div class="profile-user-details ">
                                                    <div class="profile-user-details-label">
                                                        Correo
                                                    </div>
                                                    <div class="profile-user-details-value">
                                                        <div class="field">
                                                            <input type="input" class="form__field" placeholder="<?php echo $getEmpresa->correo_emp ?>" name="txt_correo" id="txt_correo" hidden />
                                                            <label for="txt_correo" class="form__label" id="lbl_txt_correo" hidden><?php echo $getEmpresa->correo_emp ?></label>
                                                        </div>
                                                        <label id="lbl_correo"><?php echo $getEmpresa->correo_emp ?></label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="submit" class="btn" name="" id="id_input4" value="Guardar cambios" hidden>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title">
                                                <i class="fa fa-briefcase"></i>
                                                &ensp;Vacantes publicadas:&emsp;
                                                <a href="<?php echo base_url('') ?>index.php/Control/RegVacante">
                                                    <i style="color: green;" class="fa fa-upload"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="profile-user-details ">
                                        <?php foreach ($vacantesEmp as $dtVacantes) { ?>
                                            <div class="profile-user-details-label">
                                                <i class="fa fa-suitcase" style="font-size: 1.2em;"></i>
                                                <strong style="font-size: 1.3em;"><a href="#"><?php echo $dtVacantes->n_vacante ?></a></strong>&emsp;
                                                <a style="color:#3a66b7" href="<?php echo base_url('') ?>index.php/Control/Postulante/<?php echo $dtVacantes->idvacante; ?>">
                                                    <i class="fa fa-users"></i>
                                                </a> &nbsp;
                                                <a style="color:red" href="<?php echo base_url('') ?>index.php/Control/del_vacante/<?php echo $dtVacantes->idvacante; ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </div>
                                            <div class="profile-user-details-value" style="border: black;">
                                                <i class="fa fa-clock-o"></i>
                                                <?php echo substr("$dtVacantes->entrada", 0, -3) ?>
                                                &nbsp;/&nbsp;
                                                <?php echo substr("$dtVacantes->salida", 0, -3) ?>
                                                &nbsp;<strong>(<?php echo $dtVacantes->contrato ?>)</strong>
                                            </div>
                                            <div class="profile-user-details-value" style="border: black;">
                                                <i class="fa fa-file-text"></i>
                                                <?php echo $dtVacantes->des_vacante ?>
                                            </div>
                                            <div class="profile-user-details-value" style="border: black;">
                                                <i class="fa fa-list-ul"></i>
                                                <?php echo $dtVacantes->requerimiento ?>
                                            </div>
                                            <div class="profile-user-details-value" style="border: black;">
                                                <i class="fa fa-usd"></i>
                                                <?php echo $dtVacantes->salario ?>
                                            </div><br>
                                        <?php } ?>
                                    </div>

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
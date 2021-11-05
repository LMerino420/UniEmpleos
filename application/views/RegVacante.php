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
                    <li class="dropdown">

                        <a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" href="#">
                            <?php if ($this->session->userdata('login')) { ?>
                                <i class="bi bi-building"></i>
                                <span>
                                    <?php echo $this->session->userdata('usuario') ?>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            <?php } else { ?>
                                <span>
                                    Empresa
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            <?php } ?>
                        </a>

                        <ul style="background-color:#989797">

                            <?php if ($this->session->userdata('login')) { ?>
                                <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/PerfilEmp"); ?>">Mi perfil</a></li>
                                <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/RegVacante"); ?>">Registrar vacante</a></li>
                                <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Log_out"); ?>">Cerrar sesión</a></li>
                            <?php } else { ?>
                                <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Login"); ?>">Iniciar sesion</a></li>
                                <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/RegEmpresa"); ?>">Registrate</a></li>
                            <?php } ?>
                        </ul>

                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-down">
                <br><br>
                <h2 style="font-family: Cuprum, sans-serif;">¡Registra una nueva vacante!</h2>
                <p></p>
            </div>

            <div data-aos="slide-right">
                <div class="icon-box icon-box-blue">
                    <div class="px-4 pt-4 pb-0 mt-3 mb-3">
                        <!-- <?php if (isset($_SESSION['MSJ'])) { ?>
                            <div class="alert alert-info alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $_SESSION['MSJ']; ?></div>
                        <?php } ?> -->
                        <?php echo validation_errors('<div class= "alert alert-danger">', '</div>'); ?>
                        <form id="msform" enctype="multipart/form-data" method="POST">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="vacante" style="font-family: Cuprum, sans-serif;"><strong>Vacante</strong></li>
                                <li id="contrato" style="font-family: Cuprum, sans-serif;"><strong>Contrato</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-briefcase"></i>&emsp;Informacion vacante:</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Nombre de la vacante:</label>
                                    <input style="font-family:Cuprum, sans-serif;" onkeypress="return soloLetras(event)" maxlength="250" type="text" name="n_vacante" id="n_vacante" placeholder="Escribe el nombre comercial de su empresa" />
                                    <label class="fieldlabels">Nombre de la empresa:&nbsp;</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="n_empresa" id="n_empresa" value="<?php echo $getEmpresa->nombre?>" readonly/>
                                    <label class="fieldlabels">Categoria de vacante:</label>
                                    <select class="form-control d-xl-flex" style="margin-bottom: 15px;font-family:Cuprum, sans-serif;" name="categ" id="categ" required>
                                        <option value="" selected="selected">Selecciona una categoria</option>
                                        <?php foreach ($getCategoria as $dtCate) { ?>
                                            <option value="<?php echo $dtCate['idcategoria']; ?>">
                                                <?php echo $dtCate['n_categoria']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <label class="fieldlabels">Descripcion de la vacante:</label>
                                    <textarea style="font-family:Cuprum, sans-serif;" name="des_vacante" id="des_vacante" maxlength="250"></textarea>
                                    <label class="fieldlabels">Requerimientos de la vacante:</label>
                                    <textarea style="font-family:Cuprum, sans-serif;" name="requerimiento" id="requerimiento" maxlength="250"></textarea>
                                </div>
                                <input style="font-family: Cuprum, sans-serif; border-radius: 10px;" type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-pencil-square-o"></i>&emsp;Contrato / Jornada:</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Tipo de contrato:</label>
                                    <select class="form-control d-xl-flex" style="margin-bottom: 15px;font-family:Cuprum, sans-serif;" name="contrato" id="contrato">
                                        <option value="" selected="selected">Selecciona un tipo de contrato</option>
                                        <option value="Medio tiempo">Medio tiempo</option>
                                        <option value="Tiempo completo">Tiempo completo</option>
                                        <option value="Pasantia">Pasantia</option>
                                    </select>
                                    <div class="form-row">
                                        <div class="col-md-6 ">
                                            <label class="fieldlabels">Hora de entrada:</label>
                                            <input style="font-family:Cuprum, sans-serif;" type="time" name="entrada" id="entrada" />
                                        </div>
                                        <div class="col-md-6 ">
                                            <label class="fieldlabels">Hora de salida:</label>
                                            <input style="font-family:Cuprum, sans-serif;" type="time" name="salida" id="salida" />
                                        </div>
                                    </div>

                                    <label class="fieldlabels">Salario:</label>
                                    <input style="font-family:Cuprum, sans-serif;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" name="salario" id="salario" placeholder="$0.00" />

                                </div>
                                <input style="font-family: Cuprum, sans-serif; border-radius: 10px;" type="submit" name="regis_v" value="Registrar" class="action-button" />
                                <input style="font-family: Cuprum, sans-serif; border-radius: 10px;" type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">


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
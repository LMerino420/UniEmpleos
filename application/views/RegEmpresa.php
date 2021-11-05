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

        function validarEmail(elemento) {

            var texto = document.getElementById(elemento.id).value;
            var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if (!regex.test(texto)) {
                document.getElementById("resultado").innerHTML = "Escribe una cuenta de correo valida";
            } else {
                document.getElementById("resultado").innerHTML = "";
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
                    <li><a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" class="nav-link nv" href="<?php echo base_url("index.php/Control/Login"); ?>">Iniciar sesión</a></li>
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
                <h2 style="font-family: Cuprum, sans-serif;">¡Registra tu empresa!</h2>
                <p></p>
            </div>

            <div data-aos="slide-right">
                <div class="icon-box icon-box-blue">
                    <div class="px-4 pt-4 pb-0 mt-3 mb-3">
                        <?php if (isset($_SESSION['MSJ'])) { ?>
                            <div class="alert alert-info alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $_SESSION['MSJ']; ?></div>
                        <?php } ?>
                        <?php echo validation_errors('<div class= "alert alert-danger">', '</div>'); ?>
                        <form id="msform" enctype="multipart/form-data" method="POST" action="">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="empresa" style="font-family: Cuprum, sans-serif;"><strong>Empresa</strong></li>
                                <li id="personal" style="font-family: Cuprum, sans-serif;"><strong>Usuario</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-building-o"></i>&emsp;Informacion de la empresa:</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Nombre de la empresa: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="nombre" id="nombre" onkeypress="return soloLetras(event)" placeholder="Escribe el nombre comercial de su empresa" />
                                    <label class="fieldlabels">Correo de la empresa: *&nbsp;</label><a class="alertacorreo" id='resultado'></a>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="correo_emp" id="correo_emp" placeholder="Escribe tu cuenta de correo electrónico" onkeyup="validarEmail(this)" />
                                    <label class="fieldlabels">Telefono: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="tel" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="number" maxlength="8" name="telefono" id="telefono" placeholder="Digita el número de contacto de la empresa" />
                                    <label class="fieldlabels">Carga el logo de tu empresa:</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="file" accept="image/*" name="rutaimg" id="rutaimg">
                                </div>
                                <input style="font-family: Cuprum, sans-serif; border-radius: 10px;" type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-user"></i>&emsp;Información del usuario:</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Nombre: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" onkeypress="return soloLetras(event)" name="representante" id="representante" placeholder="Escribe tu nombre completo" />
                                    <label class="fieldlabels">Elige un nombre de usuario: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="usuario" id="usuario" placeholder="Escribe tu nombre de usuario" />
                                    <label class="fieldlabels">Clave de acceso: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="password" name="clave" id="clave" />
                                    <label class="fieldlabels">Confirmar tu clave: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="password" name="conf_clave" id="conf_clave" />
                                </div>
                                <input style="font-family: Cuprum, sans-serif; border-radius: 10px;" type="submit" name="registrar" value="Registrar" class="action-button" />
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
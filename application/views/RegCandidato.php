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

        h2{
            font-family:Cuprum, sans-serif;
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
                <h2 style="font-family: Cuprum, sans-serif;">¡Registra tu cuenta de estudiante o egresado!</h2>
                <p></p>
            </div>

            <div data-aos="slide-right">
                <div class="icon-box icon-box-blue">
                    <div class="px-4 pt-4 pb-0 mt-3 mb-3">
                        <?php if (isset($_SESSION['msj_cnd'])) { ?>
                            <div class="alert alert-info alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $_SESSION['msj_cnd']; ?>
                            </div>
                        <?php } ?>
                        <form id="msform" enctype="multipart/form-data" method="POST" action="">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="personal" style="font-family: Cuprum, sans-serif;"><strong>Generales</strong></li>
                                <li id="academy" style="font-family: Cuprum, sans-serif;"><strong>Academicos</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-sign-in"></i>&emsp;Información de la cuenta:</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Nombre de usuario: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="usuario" id="usuario" placeholder="Escoge un nombre de usuario" required />
                                    <label class="fieldlabels">Correo electronico: &nbsp;</label><a class="alertacorreo" id='resultado'></a>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="correo" id="correo" placeholder="Escribe tu cuenta de correo electrónico" onkeyup="validarEmail(this)" />
                                    <label class="fieldlabels">Tipo de perfil: *</label>
                                    <select class="form-control d-xl-flex" style="margin-bottom: 15px;font-family:Cuprum, sans-serif;" name="categ" id="categ" required>
                                        <option value="" selected="selected">Selecciona un tipo de perfil</option>
                                        <?php foreach ($getCategoria as $dtCate) { ?>
                                            <option value="<?php echo $dtCate['idcategoria']; ?>">
                                                <?php echo $dtCate['n_categoria']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <label class="fieldlabels">Clave de acceso: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="password" name="pwd" id="pwd" placeholder="Crea una nueva clave" required />
                                    <label class="fieldlabels">Confirmar tu clave: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="password" name="cpwd" id="cpwd" placeholder="Repite nuevamente la clave" required />

                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-user"></i>&emsp;Información personal</h2>
                                        </div>
                                    </div>
                                    
                                    <label class="fieldlabels">Nombre: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" onkeypress="return soloLetras(event)" name="nombre" id="nombre" placeholder="Escribe tus nombres" required />
                                    <label class="fieldlabels">Apellido: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" onkeypress="return soloLetras(event)" name="apellido" id="apellido" placeholder="Escribe tus apellidos" required />
                                    <label class="fieldlabels">Fecha de nacimiento: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="date" name="nacimiento" id="nacimiento" required />

                                    <label class="fieldlabels">Telefono de contacto: </label>
                                    <input style="font-family:Cuprum, sans-serif;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="number" maxlength="8" name="telef" id="telef" placeholder="Digita tu número de teléfono sin guiones. Ej. 77776666" />

                                    <label class="fieldlabels">Carga tu CV (PDF): *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="file" accept=".pdf" name="rutaCV" id="rutaCV" required>
                                </div>
                                <input style="font-family: Cuprum, sans-serif; border-radius: 10px;" type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-book"></i>&emsp;Información academica</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Universidad: *</label>
                                    <select class="form-control d-xl-flex" style="margin-bottom: 15px;font-family:Cuprum, sans-serif;" name="univ" id="univ" required>
                                        <option value="" selected="selected">Selecciona tu universidad</option>
                                        <?php foreach ($getUniv as $dtUniv) { ?>
                                            <option value="<?php echo $dtUniv["iduniv"]; ?>">
                                                <?php echo $dtUniv["n_universidad"]; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <label class="fieldlabels">Facultad: *</label>
                                    <select class="form-control d-xl-flex" style="margin-bottom: 15px;font-family:Cuprum, sans-serif;" name="facul" id="facul" required>
                                        <option value="">Selecciona tu facultad</option>
                                    </select>
                                    <label class="fieldlabels">Carrera: *</label>
                                    <select class="form-control d-xl-flex" style="margin-bottom: 15px;font-family:Cuprum, sans-serif;" name="carrera" id="carrera" required>
                                        <option value="">Selecciona tu carrera</option>
                                    </select>
                                    <label class="fieldlabels">Fecha de ingreso a la universidad: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="date" name="ingre" id="ingre" required />
                                    <label class="fieldlabels">Ultimo ciclo cursado o escribe 'egresado' si ya finalizaste tus materias: *</label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="ciclo" id="ciclo" placeholder="Escribe tu último ciclo cursado. EJ. C01-2021" required />

                                    <div class="row">
                                        <div class="col">
                                            <h2 class="fs-title"><i class="fa fa-link"></i>&emsp;Anexos</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">URL o Enlace de repositorio de proyectos: </label>
                                    <input style="font-family:Cuprum, sans-serif;" type="text" name="enlace" id="enlace" placeholder="Copia la URL de tu repositorio de proyectos" />
                                    <label class="fieldlabels">Descripcion de proyectos: </label>
                                    <textarea style="font-family:Cuprum, sans-serif;" name="descrip" id="descrip" placeholder="Escribe una breve descripción de tus proyectos. Max(250 caracteres)"></textarea>
                                </div>
                                <input style="font-family: Cuprum, sans-serif; border-radius: 10px;" type="submit" name="regis" value="Registrar" class="action-button" />
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
<script>
    $(document).ready(function() {
        $('#univ').change(function() {
            var iduniv = $('#univ').val();

            if (iduniv != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Control/ft_facultad",
                    method: "POST",
                    data: {
                        iduniv: iduniv
                    },
                    success: function(data) {
                        $('#facul').html(data);
                        $('#carrera').html('<option value="">Selecciona tu carrera</option>');
                    }
                });
            } else {
                $('#facul').html('<option value="">Selecciona tu facultad</option>');
                $('#carrera').html('<option value="">Selecciona tu carrera</option>');
            }
        });

        $('#facul').change(function() {
            var idfacultad = $('#facul').val();
            if (idfacultad != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Control/ft_carrera",
                    method: "POST",
                    data: {
                        idfacultad: idfacultad
                    },
                    success: function(data) {
                        $('#carrera').html(data);
                    }
                });
            } else {
                $('#carrera').html('<option value="">Selecciona tu carrera</option>');
            }
        });

    });
</script>
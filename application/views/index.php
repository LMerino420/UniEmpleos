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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">

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

    <style>
        .nv {
            transition: background-color .5s;
        }

        .nv:hover {
            background-color: #989797;
        }
    </style>

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex ">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="<?php echo base_url("index.php/Control"); ?>">UniEmpleos</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
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
                                    <?php } else { ?>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/PerfilEmp"); ?>">Mi perfil</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/RegVacante"); ?>">Registrar vacante</a></li>
                                        <li><a style="font-family:Cuprum, sans-serif; font-size: 18px;" class="nv" href="<?php echo base_url("index.php/Control/Log_out"); ?>">Cerrar sesión</a></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>

                        </li>
                    <?php } else { ?>
                        <li><a style="color: #F5F5F5; font-family:Cuprum, sans-serif; font-size: 18px" class="nv" href="<?php echo base_url("index.php/Control/Login"); ?>">Iniciar sesión</a></li>
                    <?php } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>

    <!-- ======= Hero Section ======= -->
    <section id="hero" <?php if ($this->session->userdata('idtipo') == 2) {
                            echo "hidden";
                        } ?>>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column " data-aos="fade-up">
                    <div>
                        <h1 style="font-family: Cuprum, sans-serif;">¿Finalizaste tu carrera o estas a punto de lograrlo y deseas trabajar para lo que te preparaste?</h1>
                        <h2 style="font-family: Cuprum, sans-serif;">Nosotros te ayudamos</h2>
                        <a class="btn shadow btn-xl rounded-pill" role="button" data-bss-hover-animate="tada" href="<?php echo base_url("index.php/Control/PublicacionesV"); ?>" style="background: #efd236;font-family: Catamaran, sans-serif;"><label>¡DESCUBRE TU OPORTUNIDAD!</label></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 " data-aos="fade-left">
                    <img src="<?php echo base_url(''); ?>assets/img/Lan-candidato.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about" <?php if ($this->session->userdata('idtipo') == 1) {
                                                echo "hidden";
                                            } ?>>
            <div class="container">

                <div class="row">
                    <div class="col-lg-6" data-aos="zoom-in">
                        <img src="<?php echo base_url(''); ?>assets/img/reclutamiento.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
                        <div class="content pt-4 pt-lg-0">
                            <h3 style="font-family: Cuprum, sans-serif;">Tienes una empresa</h3>
                            <ul>
                                <li style="font-family: Cuprum, sans-serif;"><i class="bi bi-check-circle"></i> Deseas publicar ofertas laborales</li>
                                <li style="font-family: Cuprum, sans-serif;"><i class="bi bi-check-circle"></i> Buscas personal para tu empresa</li>
                                <li style="font-family: Cuprum, sans-serif;"><i class="bi bi-check-circle"></i> Necesitas profesionales capacitados</li>
                                <li style="font-family: Cuprum, sans-serif;"><i class="bi bi-check-circle"></i> Deseas apoyar a las futuras generaciones</li>
                            </ul>
                        </div>
                        <a class="btn shadow btn-xl rounded-pill" role="button" data-bss-hover-animate="tada" href="<?php echo base_url("index.php/Control/VistaEmpresa"); ?>" style="background: #efd236;font-family: Catamaran, sans-serif;"><label>¡DESCUBRE NUEVOS TALENTOS!</label></a>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2 style="font-family: Cuprum, sans-serif;">Acerca de nosotos</h2>
                    <p></p>
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
                        <div class="icon-box icon-box-blue">
                            <div class="icon">
                                <img src="<?php echo base_url(''); ?>assets/img/UniEmpleos.png" style="width: 250px;">
                            </div>
                            <h4 class="title" style="font-family: Cuprum, sans-serif;font-size:25px"><a href="">¿Quiénes somos?</a></h4>
                            <p class="description text-justify" style="font-family: Cuprum, sans-serif;font-size:20px">
                                Somos una bolsa de empleos que está enfocada a estudiantes y egresados
                                de la carrera de Ingeniería en sistemas de la Universidad Evangélica.
                                Todos los postulantes poseen la misma experiencia y su diferenciación
                                se basa en el esfuerzo de aprender de cada estudiante.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box icon-box-cyan">
                            <div class="icon"><i class="bx bx-target-lock"></i></div>
                            <h4 class="title" style="font-family: Cuprum, sans-serif;font-size:25px"><a href="">Misión</a></h4>
                            <p class="description text-justify" style="font-family: Cuprum, sans-serif;font-size:20px">
                                Brindar oportunidades de empleo a estudiantes, para que desde un inicio de su experiencia
                                laboral inicien laborando en un puesto laboral que sea acorde a su carrera de estudios.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class="bx bx-show-alt"></i></div>
                            <h4 class="title" style="font-family: Cuprum, sans-serif;font-size:25px"><a href="">Visión</a></h4>
                            <p class="description text-justify" style="font-family: Cuprum, sans-serif;font-size:20px">
                                Ser un ejemplo a seguir para otros alumnos de universidades,
                                servir de inspiración para que abran espacios para conseguir empleos
                                acordes a las carreras de estudio a sus alumnos.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2 style="font-family: Cuprum, sans-serif;">Equipo</h2>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="zoom-in">
                            <div class="pic"><img src="<?php echo base_url(''); ?>imgDev/LuisL-logo.png" style="width: 60%; height:60%" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Luis Lopez</h4>
                                <span>Analista | Desarrollador</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img src="<?php echo base_url(''); ?>imgDev/DAbrego-logo.png" style="width: 60%; height:60%" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Daniel Abrego</h4>
                                <span>Diseñador | Desarrollador</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="200">
                            <div class="pic"><img src="<?php echo base_url(''); ?>imgDev/LMerino-logo.png" style="width: 60%; height:60%" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Lev Merino</h4>
                                <span>Tester | Desarrollador</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->

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


</body>

</html>
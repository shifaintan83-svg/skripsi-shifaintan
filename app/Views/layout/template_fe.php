<?php 
  $this->session = \Config\Services::session();
  $this->session->start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CATUR DHARMA INTEGRITAS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?=base_url()?>/assets-web/img/logo-cdi.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=base_url()?>/assets-web/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets-web/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url()?>/assets-web/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 bg-white d-none d-lg-block">
                <a href="" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <!-- <h1 class="m-0 display-3 text-primary">CATUR DHARMA INTEGRITAS</h1> -->
                     <img src="<?=base_url()?>/assets-web/img/logo-cdi.png" width="200px" alt="">
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row bg-dark d-none d-lg-flex">
                    <div class="col-lg-7 text-left text-white">
                        <div class="h-100 d-inline-flex align-items-center border-right border-primary py-2 px-3">
                            <i class="fa fa-envelope text-primary mr-2"></i>
                            <small>salescommercial.cdi@gmail.com</small>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2 px-2">
                            <i class="fa fa-phone-alt text-primary mr-2"></i>
                            <small>021-2245-9810</small>
                        </div>
                    </div>
                    <div class="col-lg-5 text-right">
                        <div class="d-inline-flex align-items-center pr-2">
                            <a class="text-primary p-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-primary p-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-primary p-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-primary p-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-primary p-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
                    <a href="" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary">CATUR DHARMA INTEGRITAS</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link <?=($active=='home'?'active':'')?>">Beranda</a>
                            <a href="/services-web" class="nav-item nav-link <?=($active=='services'?'active':'')?>">Layanan</a>
                        <?php if($this->session->get("id_level_pengguna") ==2){ ?>
                            <a href="/myorder-web" class="nav-item nav-link <?=($active=='myorder'?'active':'')?>">Pesanan Saya</a>
                        <?php }?>
                            
                            <a href="/contact-web" class="nav-item nav-link <?=($active=='contact'?'active':'')?>">Kontak</a>
                        </div>
                        <?php if($this->session->get("id_level_pengguna") ==2){ ?>
                        <a href="/logout" class="btn btn-primary mr-3 d-none d-lg-block">Logout</a>
                        <?php }else{ ?>
                        <a href="/login" class="btn btn-primary mr-3 d-none d-lg-block">Login</a>
                        <?php }?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->

	  <?= $this->renderSection('content') ?>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-6 mb-5">
                <h4 class="font-weight-semi-bold text-primary mb-4">CATUR DHARMA INTEGRITAS</h4>
                <p><i class="fa fa-map-marker-alt text-primary mr-2"></i>Jl. Boulevard Artha Gading Blok A no 1-3 , 19-21 Rt. 18 /Rw 8, Kelapa Gading Barat, Jakarta Utara 14240.</p>
                <p><i class="fa fa-phone-alt text-primary mr-2"></i>021-2245-98100</p>
                <p><i class="fa fa-envelope text-primary mr-2"></i>salescommercial.cdi@gmail.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: #3E3E4E !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">Your Site Name</a>. All Rights Reserved. Designed by <a href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary px-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets-web/lib/easing/easing.min.js"></script>
    <script src="<?=base_url()?>/assets-web/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=base_url()?>/assets-web/lib/counterup/counterup.min.js"></script>
    <script src="<?=base_url()?>/assets-web/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>/assets-web/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?=base_url()?>/assets-web/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?=base_url()?>/assets-web/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?=base_url()?>/assets-web/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?=base_url()?>/assets-web/js/main.js"></script>
</body>

</html>
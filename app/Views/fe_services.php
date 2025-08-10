<?php 
  $this->session = \Config\Services::session();
  $this->session->start();
?>
<?= $this->extend('layout/template_fe') ?>
 
<?= $this->section('content') ?>
 

    <!-- Page Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">Layanan</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn btn-sm btn-outline-light" href="">Beranda</a>
                        <i class="fas fa-angle-double-right text-light mx-2"></i>
                        <a class="btn btn-sm btn-outline-light disabled" href="">Layanan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Layanan Kami</h6>
                </div>
            </div>
            <div class="row">
                <?php 
                $nomor = 1;
                foreach ($list_layanan as $key => $value) {?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded w-50" src="<?=base_url()?>/assets-web/img/cdi-1.jpg" alt="">
                        <div class="blog-date">
                            <h4 class="font-weight-bold mb-n1"><?=$nomor++?></h4>
                        </div>
                    </div>
                   <h5 class="font-weight-medium mb-2"><?=$value['layanan']?></h5>
                    <?=$value['deskripsi']?>
                    <a class="btn btn-sm btn-primary py-2" href="/pesan/<?=$value['id']?>"><?=($this->session->get("id_level_pengguna") == 2?'Pesan':'Login Terlebih Dahulu untuk pemesanan')?></a>
                </div>
                <?php  }?>
               
            </div>
        </div>
    </div>
    <!-- Blog End -->


<?= $this->endSection() ?>


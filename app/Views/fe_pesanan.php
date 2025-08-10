<?= $this->extend('layout/template_fe') ?>
 
<?= $this->section('content') ?>
 

    <!-- Page Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">Pesanan Saya</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn btn-sm btn-outline-light" href="">Beranda</a>
                        <i class="fas fa-angle-double-right text-light mx-2"></i>
                        <a class="btn btn-sm btn-outline-light disabled" href="">Pesanan Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-12 mb-lg-12">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form  action="/pesan_action" method="POST">
                            <input type="hidden" name="id_layanan" value="<?=$id?>">
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    Nama Pelanggan
                                    <input type="text" class="form-control p-4" value="<?=$pelanggan['nama_pelanggan']?>"readonly />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    HP Pelanggan
                                    <input type="text" class="form-control p-4" value="<?=$pelanggan['hp_pelanggan']?>"readonly />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                Alamat Pelanggan
                                    <input type="text" class="form-control p-4" value="<?=$pelanggan['alamat_pelanggan']?>"readonly />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    Layanan
                                    <input type="text" class="form-control p-4" value="<?=$layanan['layanan']?>"readonly />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    Biaya 
                                    <input type="text" class="form-control p-4" value="<?=number_format($layanan['biaya'])?>"readonly />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                Waktu Pekerjaan 
                                <input type="datetime-local" name="jadwal_pemesanan" class="form-control p-4" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


<?= $this->endSection() ?>


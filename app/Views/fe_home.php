<?= $this->extend('layout/template_fe') ?>
 
<?= $this->section('content') ?>
 

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid" src="<?=base_url()?>/assets-web/img/cdi-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-primary text-uppercase mb-md-3">Cleaning Services</h5>
                            <h1 class="display-3 text-white mb-md-4">Pelayanan Terbaik</h1>
                            <a href="" class="btn btn-primary">Get A Quote</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="img-fluid" src="<?=base_url()?>/assets-web/img/cdi-3.jpeg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-primary text-uppercase mb-md-3">Cleaning Services</h5>
                            <h1 class="display-3 text-white mb-md-4">Mendahulukan Kepentingan Bersama</h1>
                            <a href="" class="btn btn-primary">Get A Quote</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="img-fluid" src="<?=base_url()?>/assets-web/img/cdi-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-primary text-uppercase mb-md-3">Cleaning Services</h5>
                            <h1 class="display-3 text-white mb-md-4">Bermanfaat Untuk Semua</h1>
                            <a href="" class="btn btn-primary">Get A Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Contact Info Start -->
    <div class="container-fluid pb-5 contact-info">
        <div class="row">
            <div class="col-lg-4 p-0">
                <div class="contact-info-item d-flex align-items-center justify-content-center bg-primary text-white py-4 py-lg-0">
                    <i class="fa fa-3x fa-map-marker-alt text-secondary mr-4"></i>
                    <div class="">
                        <h5 class="mb-2">Our Office</h5>
                        <p class="m-0">Jl. Boulevard Artha Gading Blok A no 1-3 Kelapa Gading Barat, Jakarta Utara 14240.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="contact-info-item d-flex align-items-center justify-content-center bg-secondary text-white py-4 py-lg-0">
                    <i class="fa fa-3x fa-envelope-open text-primary mr-4"></i>
                    <div class="">
                        <h5 class="mb-2">Email Us</h5>
                        <p class="m-0">salescommercial.cdi@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <div class="contact-info-item d-flex align-items-center justify-content-center bg-primary text-white py-4 py-lg-0">
                    <i class="fa fa-3x fa-phone-alt text-secondary mr-4"></i>
                    <div class="">
                        <h5 class="mb-2">Call Us</h5>
                        <p class="m-0">021-2245-9810</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->


    <!-- About Start -->
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="d-flex flex-column align-items-center justify-content-center bg-about rounded h-100 py-5 px-3">
                        <i class="fa fa-5x fa-award text-primary mb-4"></i>
                        <h1 class="display-2 text-white mb-2" data-toggle="counter-up">25</h1>
                        <h2 class="text-white m-0">Tahun Berpengalaman</h2>
                    </div>
                </div>
                <div class="col-lg-7 pt-5 pb-lg-5">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Tentang Kami</h6>
                    <h1 class="mb-4 section-title">Memberikan Layanan Terbaik</h1>
                    <h5 class="text-muted font-weight-normal mb-3">Memberi Dampak & Manfaat dengan Services yang Terbaik.</h5>
                    <p>Sebagai perusahaan yang menyediakan jasa layanan terpadu seperti cleaning service dan outsourcing, PT. Catur Dharma Integritas berkomitmen untuk memastikan klien kami dapat fokus menjalankan aktivitas bisnis secara efektif dan efisien. Kami merekrut dan mengembangkan staf kami untuk memberikan pelayanan terbaik, dengan terus melakukan pengembangan melalui teknologi dan inovasi, sehingga menghasilkan sistem kerja yang efisien. </p>
                    <div class="d-flex align-items-center pt-4">
                        <a href="" class="btn btn-primary mr-5">Learn More</a>
                        <button type="button" class="btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="font-weight-normal text-white m-0 ml-4 d-none d-sm-block">Play Video</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->



    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 pt-lg-5 pb-3">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Mengapa Harus Kami</h6>
                    <h1 class="mb-4 section-title">Jasa Cleaning Service & Outsourcing Terpercaya untuk Perusahaan</h1>
                    <p class="mb-4">Kami berkomitmen memberikan layanan unggul dengan terus meningkatkan kualitas melalui inovasi dan teknologi terbaru, memastikan kebutuhan klien terpenuhi secara optimal.</p>
                    <div class="row">
                        <div class="col-sm-4">
                            <h1 class="text-secondary mb-2" data-toggle="counter-up">225</h1>
                            <h6 class="font-weight-semi-bold mb-sm-4">Our Cleaners</h6>
                        </div>
                        <div class="col-sm-4">
                            <h1 class="text-secondary mb-2" data-toggle="counter-up">1050</h1>
                            <h6 class="font-weight-semi-bold mb-sm-4">Happy Clients</h6>
                        </div>
                        <div class="col-sm-4">
                            <h1 class="text-secondary mb-2" data-toggle="counter-up">2500</h1>
                            <h6 class="font-weight-semi-bold mb-sm-4">Projects Done</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 400px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="<?=base_url()?>/assets-web/img/feature.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->



    <!-- Testimonial Start -->
    <div class="container-fluid bg-testimonial py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 pt-lg-5 pb-5">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Testimoni</h6>
                    <h1 class="section-title text-white mb-5">Apa yang orang katakan tentang CATUR DHARMA INTEGRITAS</h1>
                    <div class="owl-carousel testimonial-carousel position-relative">
                        <div class="d-flex flex-column text-white">
                            <div class="d-flex align-items-center mb-3">
                                <img class="img-fluid" src="<?=base_url()?>/assets-web/img/testimonial-2.jpg" alt="">
                                <div class="ml-3">
                                    <h5 class="text-primary">Client Name</h5>
                                    <i>Profession</i>
                                </div>
                            </div>
                            <p>Memberi pelayanan terbaik kepada client yang dipadukan dengen kinerja yang sangat mumpuani. Memulai hari dengan senyuman yang terbaik demi hasil yang terbaik pula. Dan siap untuk berkembang kedepannya.</p>
                        </div>
                        <div class="d-flex flex-column text-white">
                            <div class="d-flex align-items-center mb-3">
                                <img class="img-fluid" src="<?=base_url()?>/assets-web/img/testimonial-2.jpg" alt="">
                                <div class="ml-3">
                                    <h5 class="text-primary">Client Name</h5>
                                    <i>Profession</i>
                                </div>
                            </div>
                            <p>Dengan CDI karyawan kami bisa menikmati ruangan yang bersih dan bagus</p>
                        </div>
                        <div class="d-flex flex-column text-white">
                            <div class="d-flex align-items-center mb-3">
                                <img class="img-fluid" src="<?=base_url()?>/assets-web/img/testimonial-3.jpg" alt="">
                                <div class="ml-3">
                                    <h5 class="text-primary">Client Name</h5>
                                    <i>Profession</i>
                                </div>
                            </div>
                            <p>Pekerjaan CDI membuat semua karyawan kami puas, dan CDI tidak pernah mengecewakan kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 400px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="<?=base_url()?>/assets-web/img/testimonial.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->




<?= $this->endSection() ?>


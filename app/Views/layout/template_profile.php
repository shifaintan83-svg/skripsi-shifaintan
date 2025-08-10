<?php 
  $this->session = \Config\Services::session();
  $this->session->start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <title>CATUR DHARMA INTEGRITAS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?=base_url()?>/assets-web/img/logo-cdi.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>/assets-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets-admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets-admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets-admin/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets-admin/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets-admin/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets-admin/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>/assets-admin/css/select2.min.css">
  

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>/assets-admin/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block" style="font-size:16px;color:#fff">PT. CATUR DHARMA INTEGRITAS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=base_url('assets/img/profile/'.$this->session->get("foto_profil"));?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"  style="color:#fff"><?=$this->session->get("nama_pengguna") ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$this->session->get("nama_pengguna") ?></h6>
              <span><?=$this->session->get("level_pengguna") ?></span>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url()?>/profilepengguna">
                <i class="bi bi-box-arrow-right"></i>
                <span>Profil</span>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url()?>/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      
      <li class="nav-item">
        <a class="nav-link <?=($url=='pemesanan'?'':'collapsed')?>" data-bs-target="#components-nav-3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pemesanan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-3" class="nav-content collapse <?=($url=='pemesanan'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <?php if($this->session->get("id_level_pengguna") == 1){ ?>
          <li>
            <a href="/pemesanan" class="<?=($url=='pemesanan'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Pemesanan</span>
            </a>
          </li>
          <?php } ?>
          <?php if($this->session->get("id_level_pengguna") == 3){ ?>
          <li>
            <a href="/catatan" class="<?=($url=='catatan'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Catatan Pemesanan</span>
            </a>
          </li>
          <?php } ?>
        </ul>
      </li>
      <?php if($this->session->get("id_level_pengguna") == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?=($url=='pelanggan'||$url=='tenaga'||$url=='layanan'?'':'collapsed')?>" data-bs-target="#components-nav-1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-1" class="nav-content collapse <?=($url=='pelanggan'||$url=='tenaga'||$url=='layanan'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/pelanggan" class="<?=($url=='pelanggan'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Pelanggan</span>
            </a>
          </li>
          <li>
            <a href="/tenaga" class="<?=($url=='tenaga'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Tenaga Kerja</span>
            </a>
          </li>
          <li>
            <a href="/layanan" class="<?=($url=='layanan'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Layanan</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link <?=($url=='laporan_pemesanan'||$url=='laporan_pemesanan'?'':'collapsed')?>" data-bs-target="#components-nav-31" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-31" class="nav-content collapse <?=($url=='laporan_pemesanan'||$url=='laporan_pemesanan'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/laporan_pemesanan" target="_blank"class="<?=($url=='laporan_pemesanan'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Laporan Pemesanan</span>
            </a>
          </li>
          <li>
            <a href="/laporan_pembayaran" target="_blank"class="<?=($url=='laporan_pembayaran'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Laporan Pembayaran</span>
            </a>
          </li>
          <li>
            <a href="/laporan_penyelesaian" target="_blank"class="<?=($url=='laporan_penyelesaian'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Laporan Penyelesaian</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link <?=($url=='pengguna'||$url=='level'?'':'collapsed')?>" data-bs-target="#components-nav-3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-3" class="nav-content collapse <?=($url=='pengguna'||$url=='level'?'show':'')?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/pengguna" class="<?=($url=='pengguna'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Pengguna</span>
            </a>
          </li>
          <li>
            <a href="/level" class="<?=($url=='level'?'active':'')?>">
              <i class="bi bi-circle"></i><span>Level Pengguna</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
    </ul>

  </aside><!-- End Sidebar-->

	<?= $this->renderSection('content') ?>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CATUR DHARMA INTEGRITAS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>/assets-admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url()?>/assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>/assets-admin/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url()?>/assets-admin/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url()?>/assets-admin/vendor/quill/quill.min.js"></script>
  <script src="<?=base_url()?>/assets-admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url()?>/assets-admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url()?>/assets-admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>/assets-admin/js/main.js"></script>

  <script src="<?=base_url()?>/assets-admin/js/sweetalert.min.js"></script>
<script src="<?=base_url()?>/assets-admin/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?=base_url()?>/assets-admin/js/select2.min.js"></script>

<script >
    
  function change_password() {
    var newPassword = $('#newPassword').val().trim();
    var renewPassword = $('#renewPassword').val().trim();
    var currentPassword = $('#currentPassword').val().trim();
    var cek = 0;
    if(newPassword.length == 0 || renewPassword.length == 0 || currentPassword.length == 0){
      cek = 1;
      swal("Isi kolom terlebih dahulu", "", "error");
    }else{
      if(newPassword != renewPassword){
        cek = 1;
        $('#newPassword').val("");
        $('#renewPassword').val("");
        swal("Password Baru Tidak Sama", "", "error");
      }
    }
    if(cek == 0){
      $.ajax({
          type: "POST",
          url: '<?=$action2?>',
          data: { 
            currentPassword: currentPassword,
            newPassword: newPassword,
          },
          context: document.body
        }).done(function(data) {
          if(data == 1){
            $('#newPassword').val("");
            $('#renewPassword').val("");
            $('#currentPassword').val("");
            swal("Success", "Pasdword sudah diubah", "success");
          }else{
            swal("Password Lama Tidak Sama", "", "error");
          }
          console.log(data);
        })
    }
  }
  
  function bacaGambaredit(input)
    {
      if(input.files && input.files[0])
      {
        var reader = new FileReader();

        reader.onload = function (e){
          $('#gambar_edit').attr('src',e.target.result);
          console.log(e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      
    }
    $('#gambar').change(function(){
        bacaGambaredit(this);
      })
    $(document).ready(function () {
        bacaGambaredit(this);
        });
</script>
</body>

</html>
<?= $this->extend('layout/template') ?>
 
<?= $this->section('content') ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$judul_page?></h1>
      <nav>
        <ol class="breadcrumb" style="background-color:#fff">
          <li class="breadcrumb-item"><a href="index.html"><?=$judul_page?></a></li>
          <li class="breadcrumb-item">Tabel</li>
          <li class="breadcrumb-item active"><?=$sub_judul_page?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?=$judul_page?> 
              </h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th width="100px">No</th>
                    <th width="200px">Jadwal Pemesanan</th>
                    <th width="200px">Layanan</th>
                    <th width="200px">Nama Pelanggan</th>
                    <th width="200px">Tenaga</th>
                    <th width="200px">Biaya</th>
                    <th width="200px">Status</th>
                    <th width="200px">#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no =1;
                    foreach ($list_pemesanan as $key => $value) {
                  ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?= date('d F Y H:i',strtotime($value['jadwal_pemesanan']))?></td>
                    <td><?= $value['layanan']?></td>
                    <td><?= $value['nama_pelanggan']?></td>
                    <td><?= $value['nama_tenaga_kerja']?></td>
                    <td><?= number_format($value['biaya'])?></td>
                    <td><?= $value['status_order']?></td>
                    <td>
                        <a href="<?=$update.'/'.$value['id']?>" class="btn btn-warning shadow btn-xs sharp me-1"><i class="bi bi-pencil-fill"></i></a>
                      </td>
                  </tr>
                  <?php } ?>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?= $this->endSection() ?>


<?= $this->extend('layout/template') ?>
 
<?= $this->section('content') ?>


<main id="main" class="main">

<div class="pagetitle">
  <h1><?=$judul_page?></h1>
  <nav>
    <ol class="breadcrumb" style="background-color:#fff">
      <li class="breadcrumb-item"><a href="index.html"><?=$judul_page?></a></li>
      <li class="breadcrumb-item">Form</li>
      <li class="breadcrumb-item active"><?=$sub_judul_page?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">

    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?=$judul_page?></h5>
          <?php 
            $was_validated = "";
          ?>
          <!-- Vertical Form -->
          <form action="<?=$action?>" class="row g-3 needs-validation <?=$was_validated?>" method="POST" novalidate>
							<input type="hidden" name="id" value="<?=$id?>">
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Jadwal Pemesanan</label>
              <div class="input-group has-validation">
                <input type="datetime-local" name="jadwal_pemesanan" class="form-control" value="<?=$jadwal_pemesanan?>" readonly>
              
              </div>
            </div>
            <div class="col-12">
              <label>Pilih Pelanggan</label>
              <select name="id_pelanggan" class="form-control select2" style="width:100%" disabled>
                <?php foreach ($list_pelanggan as $key => $value) { ?>
                  <option value="<?=$value['id']?>" <?=($value['id'] == $id_pelanggan?'selected':'')?>><?=$value['nama_pelanggan']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-12">
              <label>Pilih Layanan</label>
              <select id="id_layanan" name="id_layanan" class="form-control select2" style="width:100%" onchange="updateBiaya()" disabled>
                <?php foreach ($list_layanan as $key => $value) { ?>
                  <option value="<?=$value['id']?>" <?=($value['id'] == $id_layanan?'selected':'')?>><?=$value['layanan']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-12">
              <label>Biaya</label>
              <input type="text" name="biaya" id="biaya_layanan" class="form-control number" value="<?=number_format($biaya)?>" readonly/>
            </div>
            <div class="col-12">
              <label>Pilih Tenaga Kerja</label>
              <select name="id_tenaga_kerja" class="form-control select2" style="width:100%" disabled>
                <option value="0" <?=(0 == $id_layanan?'selected':'')?>>Pilih</option>
                <?php foreach ($list_tenaga as $key => $value) { ?>
                  <option value="<?=$value['id']?>" <?=($value['id'] == $id_tenaga_kerja?'selected':'')?>><?=$value['nama']?></option>
                <?php } ?>
              </select>
            </div>
            
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Catatan Pekerjaan</label>
                <div class="input-group has-validation">
                  <textarea name="deskripsi_pemesanan" id="summernote" class="form-control" ></textarea>
                
                </div>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?=$back?>" class="btn btn-secondary">Back</a>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<script>
        // Data array dari PHP ke JavaScript
        const layananData = <?= json_encode($list_layanan) ?>;

        window.onload = function () {updateBiaya()}

        function updateBiaya() {
            const selectedLayanan = document.getElementById('id_layanan').value;
            const biayaField = document.getElementById('biaya_layanan');
            const item = layananData.find(l => l.id === selectedLayanan);
            if (item) {
                biayaField.value = item.biaya.replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    ;
            } else {
                biayaField.value = '';
            }
        }
    </script>
<?= $this->endSection() ?>


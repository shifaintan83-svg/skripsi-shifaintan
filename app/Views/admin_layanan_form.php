<?= $this->extend('layout/template') ?>
 
<?= $this->section('content') ?>


<main id="main" class="main">

<div class="pagetitle">
  <h1><?=$judul_page?></h1>
  <nav>
    <ol class="breadcrumb" style="background-color:#fff">
      <li class="breadcrumb-item"><a href="index.html"><?=$judul_page?></a></li>
      <li class="breadcrumb-item">Forms</li>
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
            if($validation->hasError('layanan')) {
              $was_validated = "was-validated";
            }
          ?>
          <!-- Vertical Form -->
          <form action="<?=$action?>" class="row g-3 needs-validation <?=$was_validated?>" method="POST" novalidate>
							<input type="hidden" name="id" value="<?=$id?>">
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Nama Layanan</label>
              <div class="input-group has-validation">
                <input type="text" name="layanan" class="form-control" value="<?=$layanan?>"  <?=($validation->hasError('layanan')?'required=""':'')?>>
                <?php if($validation->hasError('layanan')) {?>
                  <div class="invalid-feedback">
                        <?= $validation->getError('layanan')?> 
                  </div>
                <?php }?>
              
              </div>
            </div>
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Biaya</label>
              <div class="input-group has-validation">
                <input type="text" name="biaya" class="form-control number" value="<?=number_format($biaya)?>" required>
              </div>
            </div>
            
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Deskripsi</label>
                <div class="input-group has-validation">
                  <textarea name="deskripsi" id="summernote" class="form-control" ><?=$deskripsi?></textarea>
                
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
<?= $this->endSection() ?>


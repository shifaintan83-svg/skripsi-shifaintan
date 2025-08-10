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
            if($validation->hasError('nama_pengguna')) {
              $was_validated = "was-validated";
            }
            if($validation->hasError('user_name')) {
              $was_validated = "was-validated";
            }
            if($validation->hasError('password')) {
              $was_validated = "was-validated";
            }
            if($validation->hasError('repassword')) {
              $was_validated = "was-validated";
            }
          ?>
          <!-- Vertical Form -->
          <form action="<?=$action?>" class="row g-3 needs-validation <?=$was_validated?>" method="POST" novalidate>
							<input type="hidden" name="id" value="<?=$id?>">
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Nama Pengguna</label>
              <div class="input-group has-validation">
                <input type="text" name="nama_pengguna" class="form-control" value="<?=$nama_pengguna?>"  <?=($validation->hasError('nama_pengguna')?'required=""':'')?>>
                <?php if($validation->hasError('nama_pengguna')) {?>
                  <div class="invalid-feedback">
                        <?= $validation->getError('nama_pengguna')?> 
                  </div>
                <?php }?>
              
              </div>
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Username</label>
              <input type="text" name="user_name" class="form-control" value="<?=$user_name?>" <?=($validation->hasError('user_name')?'required=""':'')?>>
              <?php if($validation->hasError('user_name')) {?>
                <div class="invalid-feedback">
                      <?= $validation->getError('user_name')?> 
                </div>
              <?php }?>
            </div>
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" value="<?=$password?>"  <?=($validation->hasError('password')?'required=""':'')?>>
              <?php if($validation->hasError('password')) {?>
                <div class="invalid-feedback">
                      <?= $validation->getError('password')?> 
                </div>
              <?php }?>
            </div>
            
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Input Ulang Password</label>
              <input type="password" name="repassword" class="form-control" value="<?=($validation->hasError('repassword')?'':$password)?>" <?=($validation->hasError('repassword')?'required=""':'')?>>
              <?php if($validation->hasError('repassword')) {?>
                <div class="invalid-feedback">
                      <?= $validation->getError('repassword')?> 
                </div>
              <?php }?>
            </div>
            
            <div class="col-12">
              <label>Pilih Level Pengguna</label>
              <select name="id_level_pengguna" class="form-control select2" style="width:100%" >
                <?php foreach ($list_level as $key => $value) { ?>
                  <option value="<?=$value['id']?>" <?=($value['id'] == $id_level_pengguna?'selected':'')?>><?=$value['level_pengguna']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-12">
              <label>Pilih Tenaga Kerja</label>
              <select name="id_tenaga_kerja" class="form-control select2" style="width:100%" >
                <option value="0" <?=(0 == $id_tenaga_kerja?'selected':'')?>>Pilih</option>
                <?php foreach ($list_tenaga as $key => $value) { ?>
                  <option value="<?=$value['id']?>" <?=($value['id'] == $id_tenaga_kerja?'selected':'')?>><?=$value['nama']?></option>
                <?php } ?>
              </select>
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


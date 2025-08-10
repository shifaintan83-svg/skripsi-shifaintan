<?= $this->extend('layout/template_profile') ?>
 
<?= $this->section('content') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Profil</h1>
  <nav>
    <ol class="breadcrumb" style="background-color:#fff">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Pengguna</li>
      <li class="breadcrumb-item active">Profil</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="<?=base_url('assets/img/profile/'.$foto_profil);?>" alt="Profile" class="rounded-circle">
          <h2><?=$nama_pengguna?></h2>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">


            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>


            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form action="<?=$action?>" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                  <div class="col-md-8 col-lg-9">
                    <!-- <img src="<?=base_url()?>/assets-admin/img/profile-img.jpg" alt="Profile"> -->
                    <input type="file" name="file_upload" id="gambar" class="pull-left" onchange="bacaGambaredit(this);">
                    <img src="<?=base_url('assets/img/profile/'.$foto_profil);?>" id="gambar_edit"alt="Profile"/>
               
                    <!-- <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                    </div> -->
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Pengguna</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="nama_pengguna" type="text" class="form-control" id="displayname" value="<?=$nama_pengguna?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="user_name" type="text" class="form-control" id="username" value="<?=$user_name?>">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Ubah Profil</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>


            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
             

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Input Ulang Password Baru</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button onclick="change_password()" class="btn btn-primary">Ubah Password</button>
                </div>

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<?= $this->endSection() ?>


<main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="row">

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="<?= base_url('assets/imgs/img-users/'.$users['img_user']) ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $users['nama_user'] ?></h2>
                        <h3><?= $users['nip'] ?></h3>
                        <div class="social-links mt-2">
                            <a class="fs-6"><?= $users['level'] ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Detail Profil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIP</div>
                                    <div class="col-lg-9 col-md-8"><?= $users['nip'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8"><?= $users['nama_user'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Jenis Kelamin</div>
                                    <div class="col-lg-9 col-md-8"><?= $users['jenis_kelamin'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nomor Telepon</div>
                                    <div class="col-lg-9 col-md-8"><?= $users['nope'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $users['email'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Alamat</div>
                                    <div class="col-lg-9 col-md-8"><?= $users['alamat'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Level</div>
                                    <div class="col-lg-9 col-md-8"><?= $users['level'] ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="post" action="<?= base_url('User/') ?>ubahUser" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="<?= base_url('assets/imgs/img-users/'.$users['img_user']) ?>" alt="Profile">
                                            <div class="pt-2">
                                                <div class="fileUpload btn btn-primary btn-sm">
                                                    <i class="bi bi-upload"></i>
                                                    <input type="file" class="upload" name="img_user" />
                                                </div>
                                                <!-- <a class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nip" type="number" class="form-control" id="nip" value="<?= $users['nip'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nama_user" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama_user" type="text" class="form-control" id="nama_user" value="<?= $users['nama_user'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                                <?php foreach( $j_kel as $jk ) : ?>
                                                    <?php if( $jk == $users['jenis_kelamin'] ) : ?>
                                                        <option value="<?= $jk ?>" selected><?= $jk ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $jk ?>"><?= $jk ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nope" class="col-md-4 col-lg-3 col-form-label">Nomor Telepon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nope" type="number" class="form-control" id="nope" value="<?= $users['nope'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="email" value="<?= $users['email'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="alamat" class="form-control" id="alamat" style="height: 100px"><?= $users['alamat'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="level" class="col-md-4 col-lg-3 col-form-label">Level</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="level" id="level" class="form-select">
                                                <?php foreach( $lev as $lv ) : ?>
                                                    <?php if( $lv == $users['level'] ) : ?>
                                                        <option value="<?= $lv ?>" selected><?= $lv ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $lv ?>"><?= $lv ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="img_user_old" value="<?= $users['img_user'] ?>">
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post" action="<?= base_url('User/') ?>ubahPassword">

                                    <div class="row mb-3">
                                        <label for="passwordLama" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="passwordLama">
                                        </div>
                                    </div>

                                    <!-- <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Pasword Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div> -->

                                    <input type="hidden" name="nip" value="<?= $users['nip'] ?>">

                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>

    </section>
</main><!-- End #main -->
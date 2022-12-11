<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Data Siswa</li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= base_url('assets/imgs/img-siswa/'.$student['img_siswa']) ?>" alt="Profile" class="rounded-circle">
              <h2><?= $student['nama_siswa'] ?></h2>
              <h3><?= $student['nis'] ?></h3>
              <div class="social-links mt-2">
                <a class="fs-6"><?= $student['nama_kejuruan']?></a>
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail Profil</button>
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
                  
                  <h5 class="card-title">Detail Biodata</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                    <div class="col-lg-9 col-md-8"><?= $student['nis'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8"><?= $student['nama_siswa'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tempat Tanggal Lahir</div>
                    <div class="col-lg-9 col-md-8"><?= $student['tempat_lahir'].', '. $student['tanggal_lahir'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-9 col-md-8"><?= $student['jenis_kelamin'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nomor Telepon</div>
                    <div class="col-lg-9 col-md-8"><?= $student['nope'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $student['email'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8"><?= $student['alamat'] ?></div>
                  </div>

                  <h5 class="card-title">Detail Akademik</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kejuruan</div>
                    <div class="col-lg-9 col-md-8"><?= $student['nama_kejuruan'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kelas X</div>
                    <?php if( $student['kelas_1'] == null ) : ?>
                      <div class="col-lg-9 col-md-8">-</div>
                    <?php else : ?>
                      <div class="col-lg-9 col-md-8"><?= $student['kelas_1'] ?></div>
                    <?php endif; ?>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kelas XI</div>
                    <?php if( $student['kelas_2'] == null ) : ?>
                      <div class="col-lg-9 col-md-8">-</div>
                    <?php else : ?>
                      <div class="col-lg-9 col-md-8"><?= $student['kelas_2'] ?></div>
                    <?php endif; ?>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kelas XII</div>
                    <?php if( $student['kelas_3'] == null ) : ?>
                      <div class="col-lg-9 col-md-8">-</div>
                    <?php else : ?>
                      <div class="col-lg-9 col-md-8"><?= $student['kelas_3'] ?></div>
                    <?php endif; ?>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tahun Ajaran</div>
                    <div class="col-lg-9 col-md-8"><?= $student['tahun_ajaran'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status Siswa</div>
                    <div class="col-lg-9 col-md-8"><?= $student['status_siswa'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tahun Keluar</div>
                    <?php if( $student['tahun_keluar'] == null ) : ?>
                      <div class="col-lg-9 col-md-8">-</div>
                    <?php else : ?>
                      <div class="col-lg-9 col-md-8"><?= $student['tahun_keluar'] ?></div>
                    <?php endif; ?>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="<?= base_url('Students/') ?>ubahSiswa" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?= base_url('assets/imgs/img-siswa/'.$student['img_siswa']) ?>" alt="Profile">
                        <div class="pt-2">
                          <div class="fileUpload btn btn-primary btn-sm">
                            <i class="bi bi-upload"></i>
                            <input type="file" class="upload" name="img_siswa" />
                          </div>
                          <!-- <a class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nis" class="col-md-4 col-lg-3 col-form-label">NIS</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nis" type="number" class="form-control" id="nis" value="<?= $student['nis'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nama_siswa" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama_siswa" type="text" class="form-control" id="nama_siswa" value="<?= $student['nama_siswa'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" value="<?= $student['tempat_lahir'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" value="<?= $student['tanggal_lahir'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                          <?php foreach( $j_kel as $jk ) : ?>
                            <?php if( $jk == $student['jenis_kelamin'] ) : ?>
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
                        <input name="nope" type="number" class="form-control" id="nope" value="<?= $student['nope'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="<?= $student['email'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="alamat" id="alamat" value="" class="form-control"><?= $student['alamat'] ?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="kode_kejuruan" class="col-md-4 col-lg-3 col-form-label">Kejuruan</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="kode_kejuruan" class="form-select" name="kode_kejuruan" required oninvalid="this.setCustomValidity('Kelas Harus Diisi !')" oninput="setCustomValidity('')">
                          <?php foreach ($kejuruan as $jurusan) : ?>
                            <?php if( $jurusan['kode_kejuruan'] == $student['kode_kejuruan'] ) : ?>
                              <option value="<?= $jurusan['kode_kejuruan'] ?>" selected><?= $jurusan['nama_kejuruan'] ?></option>
                            <?php else :?>
                              <option value="<?= $jurusan['kode_kejuruan'] ?>"><?= $jurusan['nama_kejuruan'] ?></option>
                            <?php endif ?>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="kelas_1" class="col-md-4 col-lg-3 col-form-label">Kelas X</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="kelas_1" class="form-select" name="kelas_1" >
                          <option value="">~ pilih kelas ~</option>
                          <?php foreach ($kelas as $kls){
                            $selected = '';
                            if( $student['kelas_1'] == $kls['kode_kelas'] ){
                              $selected = 'selected';
                            }
                           ?>
                              <?php if( $kls['kelas'] == 'X' ) : ?>
                                <option value="<?= $kls['kode_kelas'] ?>" <?= $selected ?>><?= $kls['kode_kelas'] ?></option>
                              <?php endif ?>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="kelas_2" class="col-md-4 col-lg-3 col-form-label">Kelas XI</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="kelas_2" class="form-select" name="kelas_2">
                          <option value="">~ pilih kelas ~</option>
                          <?php foreach ($kelas as $kls){
                            $selected = '';
                            if( $student['kelas_2'] == $kls['kode_kelas'] ){
                              $selected = 'selected';
                            }
                           ?>
                              <?php if( $kls['kelas'] == 'XI' ) : ?>
                                <option value="<?= $kls['kode_kelas'] ?>" <?= $selected ?>><?= $kls['kode_kelas'] ?></option>
                              <?php endif ?>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="kelas_3" class="col-md-4 col-lg-3 col-form-label">Kelas XII</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="kelas_3" class="form-select" name="kelas_3">
                            <option value="">~ pilih kelas ~</option>
                            <?php foreach ($kelas as $kls){
                              $selected = '';
                              if( $student['kelas_3'] == $kls['kode_kelas'] ){
                                $selected = 'selected';
                              }
                            ?>
                              <?php if( $kls['kelas'] == 'XII' ) : ?>
                                <option value="<?= $kls['kode_kelas'] ?>" <?= $selected ?>><?= $kls['kode_kelas'] ?></option>
                              <?php endif ?>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="status_siswa" class="col-md-4 col-lg-3 col-form-label">Status Siswa</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="status_siswa" id="status_siswa" class="form-select">
                          <?php foreach( $status_siswa as $stasis ) : ?>
                            <?php if( $stasis == $student['status_siswa'] ) : ?>
                              <option value="<?= $stasis ?>" selected><?= $stasis ?></option>
                            <?php else : ?>
                              <option value="<?= $stasis ?>"><?= $stasis ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="kode_tahun_ajaran" class="col-md-4 col-lg-3 col-form-label">Tahun Ajaran</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="kode_tahun_ajaran" id="kode_tahun_ajaran" class="form-select">
                          <option value="">~ Pilih Tahun Ajaran ~</option>
                          <?php foreach( $tahunAjaran as $ta ) { $selected = ''; 
                            if( $ta['kode_tahun_ajaran'] == $student['kode_tahun_ajaran'] ){
                              $selected = 'selected';
                            }
                          ?>
                              <?php if( $ta['status'] == 'AKTIF' ) : ?>
                                <option value="<?= $ta['kode_tahun_ajaran'] ?>" <?= $selected ?>><?= $ta['tahun_ajaran'] ?></option>
                              <?php endif ?>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tahun_keluar" class="col-md-4 col-lg-3 col-form-label">Tahun Keluar</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tahun_keluar" type="text" class="form-control" id="tahun_keluar" value="<?= $student['tahun_keluar'] ?>">
                      </div>
                    </div>

                    <input type="hidden" name="img_siswa_old" value="<?= $student['img_siswa'] ?>">

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="<?= base_url('Students/') ?>ubahPassword">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <input type="hidden" name="nis" value="<?= $student['nis'] ?>">

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Ubah Password</button>
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
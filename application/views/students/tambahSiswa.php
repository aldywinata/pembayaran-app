<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Data Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Data Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Siswa</h5>
                        
                        <form action="<?= base_url('Students/') ?>add" class="row g-3" method="post">
                            <div class="col-lg-6">

                                <!-- <input type="hidden" name="nis" value="<?= $nisGenerate ?>"> -->

                                <div class="col-12 mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" name="nis" id="nis" value="<?= $nisGenerate ?>" class="form-control bg-secondary" style="--bs-bg-opacity: .2;"  readonly>
                                    <div class="form-text text-danger fst-italic">Nomor NIS Otomatis Terisi</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Lengkap..">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir..">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">~ Pilih Jenis Kelamin ~</option>
                                        <?php foreach( $j_kel as $jk ) : ?> 
                                            <option value="<?= $jk ?>"><?= $jk ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nope" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="nope" name="nope" placeholder="08123xxxx">
                                </div>
                                
                                
                            </div>
                            <div class="col-lg-6">

                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@gmail.com">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="status_siswa" class="form-label">Status Siswa</label>
                                    <select name="status_siswa" id="status_siswa" class="form-control">
                                        <option value="">~ Pilih Status Siswa ~</option>
                                        <?php foreach( $status_siswa as $stasis ) : ?> 
                                            <option value="<?= $stasis ?>"><?= $stasis ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="kode_kejuruan" class="form-label">Kejuruan</label>
                                    <select name="kode_kejuruan" id="kode_kejuruan" class="form-control">
                                        <option value="">~ Pilih Kejuruan ~</option>
                                        <?php foreach( $kejuruan as $jurusan ) : ?>
                                            <option value="<?= $jurusan['kode_kejuruan'] ?>" ><?= $jurusan['nama_kejuruan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="kode_kelas" class="form-label">Kelas</label>
                                    <select name="kode_kelas" id="kode_kelas" class="form-control" >
                                        <option value="">~ Pilih Kelas ~</option>
                                        <?php foreach( $kelas as $kls ) : ?>
                                            
                                                <option value="<?= $kls['kode_kelas'] ?>"><?= $kls['kode_kelas'] ?></option>
                                            
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- <div class="col-12 mb-3">
                                    <label for="kelas_2" class="form-label">Kelas XI</label>
                                    <select name="kelas_2" id="kelas_2" class="form-control">
                                        <option value="">~ Pilih Kejuruan ~</option>
                                        <?php foreach( $kelas as $kls ) : ?>
                                            <?php if( $kls['kelas'] == 'XI' ) : ?>
                                                <option value="<?= $kls['kode_kelas'] ?>"><?= $kls['kode_kelas'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="kelas_3" class="form-label">Kelas XII</label>
                                    <select name="kelas_3" id="kelas_3" class="form-control">
                                        <option value="">~ Pilih Kejuruan ~</option>
                                        <?php foreach( $kelas as $kls ) : ?>
                                            <?php if( $kls['kelas'] == 'XII' ) : ?>
                                                <option value="<?= $kls['kode_kelas'] ?>"><?= $kls['kode_kelas'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div> -->
                                <div class="col-12 mb-3">
                                    <label for="kode_tahun_ajaran" class="form-label">Tahun Ajaran Masuk</label>
                                    <select name="kode_tahun_ajaran" id="kode_tahun_ajaran" class="form-control">
                                        <option value="">~ Pilih Tahun Ajaran ~</option>
                                        <?php foreach( $tahunAjaran as $ta ) : ?>
                                            <?php if( $ta['status'] == 'AKTIF' ) : ?>
                                                <option value="<?= $ta['kode_tahun_ajaran'] ?>"><?= $ta['tahun_ajaran'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat.."></textarea>
                                </div>
                                <div class="col-12 mb-3 modal-footer">
                                    <a href="<?= base_url('Students');?>"><button type="button" class="btn btn-secondary me-2 mb-3" data-bs-dismiss="modal">Kembali</button></a>
                                    <button type="submit" class="btn btn-primary me-2 mb-3">Tambah</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
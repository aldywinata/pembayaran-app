<main id="main" class="main">
    <div class="pagetitle">
        <h1>Ubah Data Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Ubah Data Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Data Kelas</h5>

                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            
                            <div class="dataTable-container">
                                <form class="row g-3" method="post" action="<?= base_url('Kelas/') ?>editKelas">
                                    <input type="hidden" value="<?= $kelas['kode_kelas'] ?>" name="kodeKelas">
                                    <div class="col-12">
                                        <label for="kodeKelas" class="form-label">Kode Kelas</label>
                                        <input type="text" class="form-control" id="kodeKelas" value="<?= $kelas['kode_kelas'] ?>" disabled>
                                        <div class="form-text text-danger fst-italic">Kode Kelas Otomatis Berubah</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select id="kelas" class="form-select" name="kelas" required oninvalid="this.setCustomValidity('Kelas Harus Diisi !')" oninput="setCustomValidity('')">
                                            <option value="">~ Pilih Kelas ~</option>
                                            <?php foreach ($nKelas as $nk) : ?>
                                                <?php if( $nk == $kelas['kelas'] ) : ?>
                                                    <option value="<?= $nk ?>" selected><?= $nk ?></option>
                                                <?php else :?>
                                                    <option value="<?= $nk ?>"><?= $nk ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="kodeKejuruan" class="form-label">Kejuruan</label>
                                        <select id="kodeKejuruan" class="form-select" name="kodeKejuruan" required oninvalid="this.setCustomValidity('Kelas Harus Diisi !')" oninput="setCustomValidity('')">
                                            <option value="">~ Pilih Kejuruan ~</option>
                                            <?php foreach ($kejuruan as $jurusan) : ?>
                                                <?php if( $jurusan['kode_kejuruan'] == $kelas['kode_kejuruan'] ) : ?>
                                                    <option value="<?= $jurusan['kode_kejuruan'] ?>" selected><?= $jurusan['nama_kejuruan'] ?></option>
                                                <?php else :?>
                                                    <option value="<?= $jurusan['kode_kejuruan'] ?>"><?= $jurusan['nama_kejuruan'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="namaKelas" class="form-label">Nama Kelas</label>
                                        <input type="text" class="form-control" id="namaKelas" name="namaKelas" value="<?= $kelas['nama_kelas'] ?>" required oninvalid="this.setCustomValidity('Nama Kejuruan Harus Diisi !')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Kelas');?>"><button type="button" class="btn btn-secondary me-2 mb-3" data-bs-dismiss="modal">Kembali</button></a>
                                        <button type="submit" class="btn btn-primary me-2 mb-3">Ubah</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
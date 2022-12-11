<main id="main" class="main">
    <div class="pagetitle">
        <h1>Ubah Data Kejuruan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Ubah Data Kejuruan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Data Kejuruan</h5>

                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            
                            <div class="dataTable-container">
                                <form class="row g-3" method="post" action="<?= base_url('Kejuruan/') ?>editKejuruan">
                                    <input type="hidden" value="<?= $kejuruan['kode_kejuruan'] ?>" name="kodeKejuruan">
                                    <div class="col-12">
                                        <label for="kodeKejuruan" class="form-label">Kode Kejuruan</label>
                                        <input type="text" class="form-control" id="kodeKejuruan" value="<?= $kejuruan['kode_kejuruan'] ?>" disabled>
                                        <div class="form-text text-danger fst-italic">Tidak Dapat Mengubah Kode Kejuruan</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="namaKejuruan" class="form-label">Nama Kejuruan</label>
                                        <input type="text" class="form-control" id="namaKejuruan" name="namaKejuruan" value="<?= $kejuruan['nama_kejuruan'] ?>" required oninvalid="this.setCustomValidity('Tahun Ajaran Harus Diisi !')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('Kejuruan');?>"><button type="button" class="btn btn-secondary me-2 mb-3" data-bs-dismiss="modal">Kembali</button></a>
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
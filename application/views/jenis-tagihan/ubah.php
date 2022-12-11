<main id="main" class="main">
    <div class="pagetitle">
        <h1>Ubah Data Jenis Tagihan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Data Jenis Tagihan</a></li>
                <li class="breadcrumb-item active">Ubah Data Jenis Tagihan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Data Jenis Tagihan</h5>

                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            
                            <div class="dataTable-container">
                                <form class="row g-3" method="post" action="<?= base_url('JenisTagihan/') ?>editTagihan">
                                    <input type="hidden" value="<?= $jenisTagihan['kode_tagihan'] ?>" name="kode_tagihan">
                                    <div class="col-12">
                                        <label for="kodeKelas" class="form-label">Kode Tagihan</label>
                                        <input type="text" class="form-control" id="kodeKelas" value="<?= $jenisTagihan['kode_tagihan'] ?>" disabled>
                                        <div class="form-text text-danger fst-italic">Kode Tagihan Tidak dapat diubah</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="nama_tagihan" class="form-label">Jenis Tagihan</label>
                                        <input type="text" class="form-control" name="nama_tagihan" id="nama_tagihan" value="<?= $jenisTagihan['nama_tagihan'] ?>">
                                    </div>
                                    <div class="col-12">
                                        <label for="kode_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                        <select id="kode_tahun_ajaran" class="form-select" name="kode_tahun_ajaran" required oninvalid="this.setCustomValidity('Tahun Ajaran Harus Diisi !')" oninput="setCustomValidity('')">
                                            <option value="">~ Pilih Tahun Ajaran ~</option>
                                            <?php foreach( $tahunAjaran as $ta ) { $selected = ''; 
                                                if( $ta['kode_tahun_ajaran'] == $jenisTagihan['kode_tahun_ajaran'] ){
                                                $selected = 'selected';
                                                }
                                            ?>
                                                <?php if( $ta['status'] == 'AKTIF' ) : ?>
                                                    <option value="<?= $ta['kode_tahun_ajaran'] ?>" <?= $selected ?>><?= $ta['tahun_ajaran'] ?></option>
                                                <?php endif ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="nominal" class="form-label">Nominal</label>
                                        <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $jenisTagihan['nominal'] ?>" required oninvalid="this.setCustomValidity('Nominal Harus Diisi !')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('JenisTagihan');?>"><button type="button" class="btn btn-secondary me-2 mb-3" data-bs-dismiss="modal">Kembali</button></a>
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
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Ubah Data Tahun Ajaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Ubah Data Tahun Ajaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ubah Data Tahun Ajaran</h5>

              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                <div class="dataTable-container">
                      <form class="row g-3" method="post" action="<?= base_url('tahunajaran/') ?>editTahunAjaran">
                        <input type="hidden" value="<?= $getDetailTA['kode_tahun_ajaran'] ?>" name="kodeTahun">
                        <div class="col-12">
                          <label for="kodeTahun" class="form-label">Kode Tahun Ajaran</label>
                          <input type="text" class="form-control" id="kodeTahun" value="<?= $getDetailTA['kode_tahun_ajaran'] ?>" disabled>
                          <div class="form-text text-danger fst-italic">Tidak Dapat Mengubah Kode Tahun Ajaran</div>
                        </div>
                        <div class="col-12">
                          <label for="tahunAjaran" class="form-label">Tahun Ajaran</label>
                          <input type="text" class="form-control" id="tahunAjaran" name="tahunAjaran" value="<?= $getDetailTA['tahun_ajaran'] ?>" required oninvalid="this.setCustomValidity('Tahun Ajaran Harus Diisi !')" oninput="setCustomValidity('')">
                          
                        </div>
                        <div class="col-12">
                          <label for="status" class="form-label">Status</label>
                          <select id="status" class="form-select" name="status" value="<?= $getDetailTA['status'] ?>" required oninvalid="this.setCustomValidity('Tahun Ajaran Harus Diisi !')" oninput="setCustomValidity('')">
                            <?php foreach( $statuss as $sts ) : ?>
                              <?php if( $sts == $getDetailTA['status'] ) : ?>
                                <option value="<?= $sts ?>" selected><?= $sts ?></option>
                              <?php else :?>
                                <option value="<?= $sts ?>"><?= $sts ?></option>
                              <?php endif ?>    
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <a href="<?= base_url('tahunajaran');?>"><button type="button" class="btn btn-secondary me-2 mb-3" data-bs-dismiss="modal">Kembali</button></a>
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
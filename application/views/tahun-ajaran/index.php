<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Tahun Ajaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Data Tahun Ajaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Tahun Ajaran</h5>

              <button type="button" class="btn btn-primary mb-2"  data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-add-fill"></i>Tambah</button>
              

              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                <div class="dataTable-top">
                  <div class="dataTable-dropdown">
                    <label>
                      <select name="" id="" class="dataTable-selector">
                        <option value="5">5</option>
                        <option value="10" selected>10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                      </select> Tampilkan Data
                    </label>
                  </div>
                  <div class="dataTable-search">
                    <input class="dataTable-input" placeholder="Cari Data..." type="text">
                  </div>
                </div>
                <div class="dataTable-container">
                  <table class="table datatable dataTable-table">
                    <thead>
                      <tr>
                        <th scope="col" data-sortable>
                          <a href="#" class="dataTable-sorter" >NO</a>
                        </th>
                        <th scope="col" data-sortable>
                          <a href="#" class="dataTable-sorter" >KODE TAHUN AJARAN</a>
                        </th>
                        <th scope="col" data-sortable>
                          <a href="#" class="dataTable-sorter" >TAHUN ANGKATAN</a>
                        </th>
                        <th scope="col" data-sortable>
                          <a href="#" class="dataTable-sorter" >STATUS</a>
                        </th>
                        <th scope="col" data-sortable>
                          <a href="#" class="dataTable-sorter" >AKSI</a>
                        </th>
                        <!-- 
                        <th scope="col" data-sortable>
                          <a href="#" class="dataTable-sorter" >#</a>
                        </th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach( $tahunAjaran as $ta ) : ?>
                      <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $ta['kode_tahun_ajaran'] ?></td>
                        <td><?= $ta['tahun_ajaran'] ?></td>
                        <td><?= $ta['status'] ?></td>
                        <td>
                          <!-- <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-info-circle"></i></a> -->
                          <a href="<?= base_url('tahunajaran/') ?>ubah/<?= $ta['kode_tahun_ajaran'] ?>" class="btn btn-warning"><i class="bx bxs-edit"></i></a>
                          <a href="<?= base_url('tahunajaran/') ?>hapus/<?= $ta['kode_tahun_ajaran'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');"><i class="ri-delete-bin-6-line"></i></a>
                        </td>
                      </tr>
                      <?php $no++; endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="dataTable-bottom">
                  <div class="dataTable-info">
                    Showing 1 to 1 of 1 entries
                  </div>
                  <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list"></ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Basic Modal Tambah -->
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Data Tahun Ajaran</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" method="POST" action="<?= base_url('TahunAjaran/') ?>tambah">
                        <div class="col-12">
                          <label for="kodeTahun" class="form-label">Kode Tahun Ajaran</label>
                          <input type="text" class="form-control" id="kodeTahun" name="kodeTahun" required oninvalid="this.setCustomValidity('Kode Tahun Ajaran Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-12">
                          <label for="tahunAjaran" class="form-label">Tahun Ajaran</label>
                          <input type="text" class="form-control" id="tahunAjaran" name="tahunAjaran" required oninvalid="this.setCustomValidity('Tahun Ajaran Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-12">
                          <label for="status" class="form-label">Status</label>
                          <select id="status" class="form-select" name="status" required oninvalid="this.setCustomValidity('Status Harus Diisi !')" oninput="setCustomValidity('')">
                            <option value="">~ Pilih Status ~</option>
                            <option value="AKTIF">AKTIF</option>
                            <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div><!-- End Basic Modal-->
</main>
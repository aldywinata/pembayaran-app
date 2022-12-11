<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Kejuruan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Data Kejuruan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kejuruan</h5>

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
                                            <a href="#" class="dataTable-sorter" >KODE KEJURUAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >NAMA KEJURUAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >AKSI</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach( $kejuruan as $jurusan ) : ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $jurusan['kode_kejuruan'] ?></td>
                                            <td><?= $jurusan['nama_kejuruan'] ?></td>
                                            <td>
                                            <!-- <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-info-circle"></i></a> -->
                                            <a href="<?= base_url('Kejuruan/') ?>ubah/<?= $jurusan['kode_kejuruan'] ?>" class="btn btn-warning"><i class="bx bxs-edit"></i></a>
                                            <a href="<?= base_url('Kejuruan/') ?>hapus/<?= $jurusan['kode_kejuruan'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');"><i class="ri-delete-bin-6-line"></i></a>
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
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kejuruan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="<?= base_url('Kejuruan/') ?>tambah">
                        <div class="col-12">
                            <label for="kodeKejuruan" class="form-label">Kode Kejuruan</label>
                            <input type="text" class="form-control" id="kodeKejuruan" name="kodeKejuruan" required oninvalid="this.setCustomValidity('Kode Kejuruan Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-12">
                            <label for="namaKejuruan" class="form-label">Nama Kejuruan</label>
                            <input type="text" class="form-control" id="namaKejuruan" name="namaKejuruan" required oninvalid="this.setCustomValidity('Nama Kejuruan Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
</main>
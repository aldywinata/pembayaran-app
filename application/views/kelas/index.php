<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Data Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kelas</h5>

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
                                    <thead class="table-secondary">
                                        <tr>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >NO</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >KODE KELAS</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >KELAS</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >JURUSAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >NAMA KELAS</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >AKSI</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach( $kelas as $kls ) : ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $kls['kode_kelas'] ?></td>
                                            <td><?= $kls['kelas'] ?></td>
                                            <td><?= $kls['kode_kejuruan'] ?></td>
                                            <td><?= $kls['nama_kelas'] ?></td>
                                            <td>
                                            <!-- <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-info-circle"></i></a> -->
                                            <a href="<?= base_url('Kelas/') ?>ubah/<?= $kls['kode_kelas'] ?>" class="btn btn-warning"><i class="bx bxs-edit"></i></a>
                                            <a href="<?= base_url('Kelas/') ?>hapus/<?= $kls['kode_kelas'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');"><i class="ri-delete-bin-6-line"></i></a>
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
                    <form class="row g-3" method="POST" action="<?= base_url('kelas/') ?>tambah">
                        <div class="col-12">
                            <label for="kodeKelas" class="form-label">Kode Kelas</label>
                            <input type="text" class="form-control" id="kodeKelas" name="kodeKelas" required oninvalid="this.setCustomValidity('Kode Kelas Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-12">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select id="kelas" class="form-select" name="kelas" required oninvalid="this.setCustomValidity('Kelas Harus Diisi !')" oninput="setCustomValidity('')">
                                <option value="">~ Pilih Kelas ~</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="kodeKejuruan" class="form-label">Kejuruan</label>
                            <select id="kodeKejuruan" class="form-select" name="kodeKejuruan" required oninvalid="this.setCustomValidity('Kelas Harus Diisi !')" oninput="setCustomValidity('')">
                                <option value="">~ Pilih Kejuruan ~</option>
                                <?php foreach ($kejuruan as $jurusan) : ?>
                                    <option value="<?= $jurusan['kode_kejuruan'] ?>"><?= $jurusan['nama_kejuruan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="namaKelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="namaKelas" name="namaKelas" required oninvalid="this.setCustomValidity('Nama Kejuruan Harus Diisi !')" oninput="setCustomValidity('')">
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
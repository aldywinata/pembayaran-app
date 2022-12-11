<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Jenis Tagihan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Data Jenis Tagihan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Jenis Tagihan</h5>

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
                                            <a href="#" class="dataTable-sorter" >KODE TAGIHAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >JENIS TAGIHAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >TAHUN AJARAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >NOMINAL</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >AKSI</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach( $jenisTagihan as $value ) : ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $value['kode_tagihan'] ?></td>
                                            <td><?= $value['nama_tagihan'] ?></td>
                                            <td><?= $value['tahun_ajaran'] ?></td>
                                            <td><?= 'Rp. ' . number_format($value['nominal'], 0, ",", ".") ?></td>
                                            <td>
                                            <!-- <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-info-circle"></i></a> -->
                                            <a href="<?= base_url('JenisTagihan/') ?>ubah/<?= $value['kode_tagihan'] ?>" class="btn btn-warning"><i class="bx bxs-edit"></i></a>
                                            <a href="<?= base_url('JenisTagihan/') ?>hapus/<?= $value['kode_tagihan'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');"><i class="ri-delete-bin-6-line"></i></a>
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
                    <h5 class="modal-title">Tambah Data Tagihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="<?= base_url('JenisTagihan/') ?>tambah">
                        <div class="col-12">
                            <label for="kode_tagihan" class="form-label">Kode Tagihan</label>
                            <input type="text" name="kode_tagihan" id="kode_tagihan" value="<?= $kodeGenerate ?>" class="form-control bg-secondary" style="--bs-bg-opacity: .2;"  readonly>
                            <div class="form-text text-danger fst-italic">Kode Tagihan Otomatis Terisi</div>
                        </div>

                        <div class="col-12">
                            <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
                            <input type="text" class="form-control" id="nama_tagihan" name="nama_tagihan" placeholder="Nama Tagihan.." required oninvalid="this.setCustomValidity('Nama Tagihan Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>

                        <div class="col-12">
                            <label for="kode_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                            <select id="kodeKkode_tahun_ajaranjuruan" class="form-select" name="kode_tahun_ajaran" required oninvalid="this.setCustomValidity('Tahun Ajaran Harus Diisi !')" oninput="setCustomValidity('')">
                                <option value="">~ Pilih Tahun Ajaran ~</option>
                                <?php foreach ($tahunAjaran as $value) : ?>
                                    <?php if( $value['status'] == 'AKTIF' ) : ?>
                                        <option value="<?= $value['kode_tahun_ajaran'] ?>"><?= $value['tahun_ajaran'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Nominal.." required oninvalid="this.setCustomValidity('Nominal Harus Diisi !')" oninput="setCustomValidity('')">
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
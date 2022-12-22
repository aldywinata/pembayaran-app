<main id="main" class="main">
    <div class="pagetitle">
        <h1>Konfirmasi Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Konfirmasi Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Konfirmasi Pembayaran</h5>

                        <!-- <button type="button" class="btn btn-primary mb-2"  data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-add-fill"></i>Tambah</button> -->

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
                                                <a href="#" class="dataTable-sorter" >BUKTI TRANSFER</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >TANGGAL PEMBAYARAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >KODE PEMBAYARAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >TOTAL PEMBAYARAN</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >AKSI</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if( empty($staPem) ) : ?>
                                            <tr>
                                                <td colspan="6" class="text-center text-danger"><?= "Tidak Ada Data" ?></td>
                                            </tr>
                                        <?php else : ?>
                                            <?php $no=1; foreach( $staPem as $lunas ) : ?>
                                                <?php if( $lunas['status_pembayaran'] == 'KONFIRMASI' ) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $lunas['img_pembayaran'] ?></td>
                                                        <td><?= date('d-m-Y', strtotime($lunas['tanggal_pembayaran'])) ?></td>
                                                        <td><?= $lunas['kode_pembayaran'] ?></td>
                                                        <td>Rp. <?= number_format($lunas['total'], 0, ",", ".") ?></td>
                                                        <td>
                                                        <a href="<?= base_url('KonfirmasiPembayaran/') ?>detail/<?= $lunas['kode_pembayaran'] ?>" class="btn btn-info" ><i class="bi bi-info-circle"></i></a>
                                                        <!-- <a href="<?= base_url('InputPembayaran/') ?>pembayaran/<?= $lunas['nis'] ?>" class="btn btn-warning"><i class="bi bi-cash"></i></a> -->
                                                        <!-- <a href="<?= base_url('InputPembayaran/') ?>hapus/<?= $lunas['nis'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');"><i class="ri-delete-bin-6-line"></i></a> -->
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                            <?php if( $lunas['status_pembayaran'] <> 'KONFIRMASI' ) : ?>
                                                <tr>
                                                    <td colspan="6" class="text-center text-danger"><?= "Tidak Ada Data" ?></td>
                                                </tr>
                                            <?php endif ?>                
                                        <?php endif ?>
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
</main>
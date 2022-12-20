<main id="main" class="main">
    <div class="pagetitle">
        <h1>Invoice Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Riwayat Pembayaran</a></li>
                <li class="breadcrumb-item active">Invoice Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice Pembayaran</h5>

                        <!-- <button type="button" class="btn btn-primary mb-2"  data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-add-fill"></i>Tambah</button> -->

                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Kode Pembayaran</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $staLunas['kode_pembayaran'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tanggal Pembayaran</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= date('d-m-Y', strtotime($staLunas['tanggal_pembayaran'])) ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $staLunas['nis'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Siswa</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $staLunas['nama_siswa'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Jurusan</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $staLunas['kode_kejuruan'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Kelas</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">
                                        <?php
                                            $x  = 'KTA2022';
                                            $xi = 'KTA2021';
                                            $xii= 'KTA2020';
                                            if( $staLunas['kode_tahun_ajaran'] == $x ){
                                                echo $staLunas['kelas_1'];
                                            }elseif( $staLunas['kode_tahun_ajaran'] == $xi ){
                                                echo $staLunas['kelas_2'];
                                            }elseif( $staLunas['kode_tahun_ajaran'] == $xii ){
                                                echo $staLunas['kelas_3'];
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="dataTable-container">
                                <h5 class="card-title">Detail Pembayaran</h5>

                                <table class="table datatable dataTable-table">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable" >NO</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable" >Kode Pembayaran</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable" >Kode Tagihan</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable" >Pembayaran</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable" >Nominal</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach( $dePem as $dPem ) : ?>
                                            <?php if( $dPem['kode_pembayaran'] == $staLunas['kode_pembayaran'] ) : ?>
                                                
                                            
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $dPem['kode_pembayaran'] ?></td>
                                                        <td><?= $dPem['kode_tagihan'] ?></td>
                                                        <td><?= $dPem['keterangan'] ?></td>
                                                        <td>Rp. <?= number_format($dPem['nominal'], 0, ",", ".") ?></td>
                                                    </tr>
                                                    
                                                
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" class=" fw-bold">Total Pembayaran</td>
                                            <td class="fw-bold">Rp. <?= number_format($staLunas['total'], 0, ",", ".") ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" class="">Pembayaran</td>
                                            <td class="fw-bold">Rp. <?= number_format($staLunas['bayar'], 0, ",", ".") ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="3" class="">Uang Kembalian</td>
                                            <td class="fw-bold">Rp. <?= number_format($staLunas['kembalian'], 0, ",", ".") ?></td>
                                        </tr>
                                    </tbody>
                                </table> 
                                <div class="modal-footer mt-5">
                                    <a href="<?= base_url('RiwayatPembayaran');?>"><button type="button" class="btn btn-secondary me-2 mb-3" data-bs-dismiss="modal"><i class="bx bx-arrow-back"></i></button></a>
                                    <a href="<?= base_url('RiwayatPembayaran/')?>print/<?= $staLunas['kode_pembayaran'] ?>"><button type="button" class="btn btn-primary me-2 mb-3" data-bs-dismiss="modal"><i class="bi bi-printer"></i></button></a>
                                    <!-- <button type="submit" class="btn btn-primary me-2 mb-3"><i class="bi printer-fill"></i> Ubah</button> -->
                                </div>            
                            </div>
                            <div class="dataTable-bottom">
                                <div class="dataTable-info">
                                    *Cek Kembali Detail Pembayaran
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
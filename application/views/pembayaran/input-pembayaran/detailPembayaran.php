<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Input Pembayaran</a></li>
                <li class="breadcrumb-item active">Detail Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Siswa</h5>

                        <!-- <button type="button" class="btn btn-primary mb-2"  data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-add-fill"></i>Tambah</button> -->

                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $students['nis'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Siswa</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $students['nama_siswa'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Jurusan</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $students['nama_kejuruan'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Kelas</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">
                                        <?php
                                            $x  = 'KTA2022';
                                            $xi = 'KTA2021';
                                            $xii= 'KTA2020';
                                            if( $students['kode_tahun_ajaran'] == $x ){
                                                echo $students['kelas_1'];
                                            }elseif( $students['kode_tahun_ajaran'] == $xi ){
                                                echo $students['kelas_2'];
                                            }elseif( $students['kode_tahun_ajaran'] == $xii ){
                                                echo $students['kelas_3'];
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
                                            <a href="#" class="dataTable" >Kode Tagihan</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable" >Keterangan</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable" >Nominal</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach( $dePem as $dPem ) : ?>
                                            <?php if( $dPem['nis'] == $students['nis'] ) : ?>
                                                <?php if( $dPem['status_pembayaran'] == "PROSES" ) { 
                                                    $nominal[] = $dPem['nominal'];
                                                    $total = array_sum($nominal);    
                                                ?>
                                            
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $dPem['kode_tagihan'] ?></td>
                                                        <td><?= $dPem['keterangan'] ?></td>
                                                        <td>Rp. <?= number_format($dPem['nominal'], 0, ",", ".") ?></td>
                                                    </tr>
                                                    
                                                <?php } ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="2" class=" fw-bold">TOTAL</td>
                                            <td class="fw-bold">Rp. <?= number_format($total, 0, ",", ".") ?></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="<?= base_url('InputPembayaran/') ?>bayar" method="post">
                                    <input type="hidden" name="total" value="<?=$total?>">
                                    <input type="hidden" name="nis" value="<?= $students['nis'] ?>">
                                    <input type="hidden" name="kode_pembayaran" value="<?= $dPem['kode_pembayaran'] ?>">

                                    <?php
                                        if( !empty($this->session->flashdata('Info')) ){
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                            echo '<i class="bi bi-exclamation-octagon me-1"></i>';
                                            echo $this->session->flashdata('Info');
                                            echo ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                            echo '</div>';
                                        }
                                    ?>

                                    
                                    <h5 class="card-title">Pembayaran</h5>

                                    <input type="hidden" id="total" name="total" value="<?= $total ?>">

                                    <div class="col-5 mb-3">
                                        <label for="nominal_bayar" class="form-label">Nominal Pembayaran</label>
                                        <input type="number" class="form-control" id="nominal_bayar" name="nominal_bayar" onkeyup="hitungKembalian()" placeholder="Rp. ............" required>
                                    </div>

                                    <div class="col-5 mb-3">
                                        <label for="nominal_bayar" class="form-label">Kembalian Rp. </label>
                                        <label id="kembalian" class="form-label text-danger">0</label>
                                    </div>

                                    <div class="d-grid gap-2 d-md-flex me-5 justify-content-md-end">
                                        <button type="submit" class="btn btn-primary me-2 mb-3">Bayar</button>
                                    </div>
                                </form>                  
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
<script>
    function hitungKembalian(){
    var total = document.getElementById("total").value;
    var nominal_bayar = document.getElementById("nominal_bayar").value;
    var kembalian = nominal_bayar - total;

    if( kembalian < 0 ){
        var kembalian = "Uang Tidak Cukup";
    }

    document.getElementById("kembalian").innerHTML=kembalian;
}
</script>
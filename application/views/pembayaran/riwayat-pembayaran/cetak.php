<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/vendor/') ?>img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/vendor/') ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Css buatan -->
  <!-- <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/') ?>vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/vendor/') ?>css/style.css" rel="stylesheet">

</head>

<body class="">
<!-- <main id="main" class="main"> -->
    <!-- <section class="section"> -->
        <!-- <div class="row"> -->
            <!-- <div class="col-lg-12"> -->
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title text-center">Invoice Pembayaran</h5>

                        <!-- <button type="button" class="btn btn-primary mb-2"  data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-add-fill"></i>Tambah</button> -->

                        <div class=" dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            <div class="card-body bg-white">
                                <table border="0">
                                    <tr>
                                        <td style="width: 180px;">Kode Pembayaran</td>
                                        <td></td>
                                        <td class="text-secondary"><?= $staLunas['kode_pembayaran'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 180px;">Tanggal Pembayaran</td>
                                        <td></td>
                                        <td class="text-secondary"><?= date('d-m-Y', strtotime($staLunas['tanggal_pembayaran'])) ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 180px;">NIS</td>
                                        <td></td>
                                        <td class="text-secondary"><?= $staLunas['nis'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 180px;">Nama Siswa</td>
                                        <td></td>
                                        <td class="text-secondary"><?= $staLunas['nama_siswa'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 180px;">Jurusan</td>
                                        <td></td>
                                        <td class="text-secondary"><?= $staLunas['kode_kejuruan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 180px;">Kelas</td>
                                        <td></td>
                                        <td class="text-secondary">
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
                                        </td>
                                    </tr>
                                    
                                </table>
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

                                <table class="mb-4 mt-4">
                                    <tr>
                                        <td>Bogor, <?= date('D M Y') ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>...................................</td>
                                    </tr>
                                </table>
                                            
                            </div>
                            <div class="dataTable-bottom">
                                <div class="dataTable-info">
                                    *Dicetak Melalui SIPB Sekolah
                                </div>
                                <nav class="dataTable-pagination">
                                    <ul class="dataTable-pagination-list"></ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    <!-- </section> -->
<!-- </main> -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    
    
    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/vendor/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/vendor/') ?>vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/vendor/') ?>vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('assets/js/') ?>script.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/vendor/') ?>js/main.js"></script>

</body>
</html>
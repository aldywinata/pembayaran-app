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
                        <h5 class="card-title">Detail Pembayaran</h5>

                        <!-- <button type="button" class="btn btn-primary mb-2"  data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-add-fill"></i>Tambah</button> -->

                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            <div class="card-body">
                                <!-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Kode Detail Pembayaran</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $dePem['kode_pembayaran_detail'] ?></div>
                                </div> -->
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
                                <h5 class="card-title">Pembayaran</h5>

                                <table class="table datatable dataTable-table">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >NO</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >Kode Tagihan</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >Keterangan</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >Nominal</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach( $dePem as $dPem ) : ?>
                                            
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $dPem['kode_tagihan'] ?></td>
                                                <td><?= $dPem['keterangan'] ?></td>
                                                <td><?= $dPem['nominal'] ?></td>
                                            </tr>
                                            
                                        <?php $no++; endforeach ?>
                                        
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
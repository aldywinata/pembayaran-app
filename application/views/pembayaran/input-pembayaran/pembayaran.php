<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Input Pembayaran</a></li>
                <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pembayaran</h5>

                        <!-- <button type="button" class="btn btn-primary mb-2"  data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-add-fill"></i>Tambah</button> -->

                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $students['nis'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Nama Siswa</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $students['nama_siswa'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Jurusan</div>
                                    <div class="col-lg-9 col-md-8 text-secondary"><?= $students['nama_kejuruan'] ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Kelas</div>
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
                                <h5 class="card-title">Tagihan</h5>

                                <form action="<?= base_url('InputPembayaran/') ?>add" method="post">

                                    <input type="hidden" name="kode_pembayaran" value="<?= $kodeGenerate ?>">
                                    <input type="hidden" name="kode_pembayaran_detail" value="<?= $kodeGenerateDP ?>">
                                    <input type="hidden" name="nis" value="<?= $students['nis'] ?>">
                                    <!-- <input type="text" name="id[]" value=""> -->

                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Tagihan SPP
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                      
                                                <?php foreach( $bulans as $bulan ) : ?>
                                                    <div class="accordion-body">
                                                    <?php foreach( $jenis_tagihan as $tagihan ) : ?>
                                                        <?php if( $tagihan['kode_tahun_ajaran'] == $students['kode_tahun_ajaran'] ) : ?>
                                                            <?php if( $tagihan['nama_tagihan'] == 'SPP' ) : ?>
                                                                    <input class="form-check-input" type="checkbox" name="kode_tagihan[]" value="<?= $tagihan['kode_tagihan'] ?>">
                                                                    <input type="hidden" name="keterangan[]"  value="<?= $bulan ?>">
                                                                    <input type="hidden" name="nominal[]"  value="<?= $tagihan['nominal'] ?>">
                                                                    <label class="form-check-label">
                                                                        <?= $tagihan['nama_tagihan'].' ' .$bulan ?>
                                                                    </label> <br>
                                                                    <label class="form-check-label text-danger ms-4">
                                                                        Rp. <?= $tagihan['nominal'] ?>
                                                                    </label>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Tagihan Lainnya
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <?php foreach( $jenis_tagihan as $tagihan ) : ?>
                                                <div class="accordion-body">
                                                        <?php if( $tagihan['kode_tahun_ajaran'] == $students['kode_tahun_ajaran'] ) : ?>
                                                            <?php if( $tagihan['nama_tagihan'] <> 'SPP' ) : ?>
                                                                    <input class="form-check-input" type="checkbox" name="kode_tagihan[]" value="<?= $tagihan['kode_tagihan'] ?>">
                                                                    <input type="hidden" name="keterangan[]" value="<?= $tagihan['nama_tagihan'] ?>">
                                                                    <input type="hidden" name="nominal[]" value="<?= $tagihan['nominal'] ?>">
                                                                    <label class="form-check-label">
                                                                        Tagihan <?= $tagihan['nama_tagihan'] ?>
                                                                    </label> <br>
                                                                    <label class="form-check-label text-danger ms-4">
                                                                        Rp. <?= $tagihan['nominal'] ?>
                                                                    </label>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                </div>
                                            <?php endforeach ?>
                                            </div>
                                        </div>
                                        
                                    </div><!-- End Default Accordion Example -->

                                    <div class="col-12 mb-3 mt-4 modal-footer">
                                        <a href="<?= base_url('InputPembayaran');?>"><button type="button" class="btn btn-secondary me-2 mb-3" data-bs-dismiss="modal">Kembali</button></a>
                                        <button type="submit" class="btn btn-primary me-2 mb-3"> Selanjutnya</button>
                                    </div>
                                
                                </form>                    
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
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Cetak Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Cetak Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter Tanggal</h5>

                        <form action="<?= base_url('Laporan/index') ?>" method="get">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="startdate">
                                <span class="input-group-text">s/d</span>
                                <input type="date" class="form-control" name="enddate">
                            </div>

                            <button type="submit" name="tampil" class="btn btn-primary mb-2"><i class="bi bi-search"></i> Tampil</button>
                            <!-- <?php if( isset($_GET['tampil']) ) : ?>
                                <a href="<?= base_url('Laporan/index') ?>" class="btn btn-warning mt-n5"><i class="bx bxs-edit"></i></a>
                            <?php endif ?> -->
                        </form>

                        
                        <?php if( isset($_GET['tampil']) ) : ?>            
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns search-result mt-3">
                                <div class="dataTable">
                                    <div class="pagetitle mb-4">
                                        <h1 class="text-center">Laporan Pembayaran</h1>
                                    </div>
                                </div>
                                
                                <div class="dataTable-container">
                                    <label><?php echo $label ?></label>
                                    <table class="table datatable dataTable-table mt-1">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >NO</a>
                                                </th>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >KODE PEMBAYARAN</a>
                                                </th>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >TANGGAL PEMBAYARAN</a>
                                                </th>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >METODE PEMBAYARAN</a>
                                                </th>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >TOTAL</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( empty($pembayarans) ) : ?>
                                                <tr>
                                                    <td colspan="5" align="center"><?= "Tidak Ada Data" ?></td>
                                                </tr>
                                            <?php else : ?>
                                                <?php $no = 1; foreach( $pembayarans as $pembayaran ) : ?>
                                                    <?php if( $pembayaran->status_pembayaran == "LUNAS" ) { 
                                                        $nominal[] = $pembayaran->total;
                                                        $total = array_sum($nominal);    
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $pembayaran->kode_pembayaran ?></td>
                                                            <td><?= date('d-m-Y', strtotime($pembayaran->tanggal_pembayaran)) ?></td>
                                                            <td><?= $pembayaran->metode_pembayaran ?></td>
                                                            <td>Rp. <?= number_format($pembayaran->total, 0, ",", ".") ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="3" class=" fw-bold">Total</td>
                                                    <td class="fw-bold">Rp. <?= number_format($total, 0, ",", ".") ?></td>
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
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
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="<?= base_url('user/') ?>tambah" enctype="multipart/form-data">

                        <div class="col-12">
                            <label for="img_user" class="form-label">Foto Profil</label>
                            <!-- <div class="col-sm-10"> -->
                                <input class="form-control" type="file" name="img_user" id="img_user" class="img_user" required oninvalid="this.setCustomValidity('Foto Harus Diisi !')" oninput="setCustomValidity('')">
                            <!-- </div> -->
                        </div>

                        <div class="col-12">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP..." required oninvalid="this.setCustomValidity('NIP Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-12">
                            <label for="nama_user" class="form-label">Nama User</label>
                            <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama User..." required oninvalid="this.setCustomValidity('Nama User Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-12">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="form-select" name="jenis_kelamin" required oninvalid="this.setCustomValidity('Jenis Kelamin Harus Diisi !')" oninput="setCustomValidity('')">
                                <option value="">~ Pilih Jenis Kelamin ~</option>
                                <?php foreach( $j_kel as $jk ) : ?>
                                    <option value="<?= $jk ?>"><?= $jk ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="nope" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" id="nope" name="nope" placeholder="Nomor Telepon..." required oninvalid="this.setCustomValidity('Nomor Telepon Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email..." required oninvalid="this.setCustomValidity('Nomor Telepon Harus Diisi !')" oninput="setCustomValidity('')">
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat..." required oninvalid="this.setCustomValidity('Alamat Harus Diisi !')" oninput="setCustomValidity('')"></textarea>
                        </div>

                        <div class="col-12">
                            <label for="level" class="form-label">Level</label>
                            <select id="level" class="form-select" name="level" required oninvalid="this.setCustomValidity('Jenis Kelamin Harus Diisi !')" oninput="setCustomValidity('')">
                                <option value="">~ Pilih Level ~</option>
                                <?php foreach( $lev as $lv ) : ?>
                                    <option value="<?= $lv ?>"><?= $lv ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password..." required oninvalid="this.setCustomValidity('Password Harus Diisi !')" oninput="setCustomValidity('')">
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
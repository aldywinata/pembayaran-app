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
                                <a href="<?= $url_print ?>" ><button type="button" class="btn btn-outline-success me-2 mb-3"><i class="bi bi-printer"></i> Print</button></a>
                                <div class="dataTable">
                                    <div class="pagetitle mb-4">
                                        <h1 class="text-center">Laporan Pembayaran</h1>
                                    </div>
                                </div>
                                
                                <div class="dataTable-container">
                                    <label>Laporan : <?php echo $label ?></label>
                                    <table class="table datatable dataTable-table mt-1">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >NO</a>
                                                </th>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >TANGGAL PEMBAYARAN</a>
                                                </th>
                                                <th scope="col" data-sortable>
                                                <a href="#" class="dataTable-sorter" >KODE PEMBAYARAN</a>
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
                                                    <td colspan="5" class="text-center text-danger"><?= "Tidak Ada Data" ?></td>
                                                </tr>
                                            <?php else : ?>
                                                <?php $no = 1; foreach( $pembayarans as $pembayaran ) : ?>
                                                    <?php if( $pembayaran->status_pembayaran == "LUNAS" ) { 
                                                        $nominal[] = $pembayaran->total;
                                                        $total = array_sum($nominal);    
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= date('d-m-Y', strtotime($pembayaran->tanggal_pembayaran)) ?></td>
                                                            <td><?= $pembayaran->kode_pembayaran ?></td>
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
</main>
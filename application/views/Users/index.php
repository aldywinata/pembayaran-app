<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Data Users</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Users</h5>

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
                                            <a href="#" class="dataTable-sorter" >FOTO</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >NIP</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >NAMA USER</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >LEVEL</a>
                                            </th>
                                            <th scope="col" data-sortable>
                                            <a href="#" class="dataTable-sorter" >AKSI</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach( $users as $user ) : ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><img src="<?= base_url('assets/imgs/img-users/'.$user['img_user']) ?>"  class="rounded-circle img-size rounded" alt=""></td>
                                            <td><?= $user['nip'] ?></td>
                                            <td><?= $user['nama_user'] ?></td>
                                            <td><?= $user['level'] ?></td>
                                            <td>
                                            <!-- <a href="<?= base_url('User/') ?>profil/<?= $user['nip'] ?>" class="btn btn-info" ><i class="bi bi-info-circle"></i></a> -->
                                            <a href="<?= base_url('User/') ?>profil/<?= $user['nip'] ?>" class="btn btn-warning"><i class="bx bxs-edit"></i></a>
                                            <a href="<?= base_url('User/') ?>hapus/<?= $user['nip'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');"><i class="ri-delete-bin-6-line"></i></a>
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
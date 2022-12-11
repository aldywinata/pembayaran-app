<nav class="navbar bg-white border-bottom">
    <div class="container-fluid ms-4 me-4">
        <a class="navbar-brand fs-2 fw-bold dark-blue">SMK NOT FOUND</a>
        
        <ul class="nav justify-content-end" id="navi">
            <li class="nav-item fs-4">
                <p class="nav-link fw-bold m-auto gray">FOLLOW US</p>
            </li>
            
            <li class="nav-item fs-4 ">
                <a class="nav-link active" aria-current="page" href="#"><i class="fa-brands fa-facebook"></i></a>
            </li>
            <li class="nav-item fs-4">
                <a class="nav-link" href="#"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li class="nav-item fs-4">
                <a class="nav-link" href="#"><i class="fa-brands fa-youtube"></i></a>
            </li>
        </ul>
    </div>
</nav>
<section class="container-fluid" >
    <div class="row" id="c-login">
        <div class="col-8" style="height: 89vh;" id="b-login">
            <div class="d-flex justify-content-start mt-5 pt-4 my-auto align-items-center " id="f-login">    
                <form method="POST" action="<?= base_url('auth') ?>" class="col-md-6 ms-4 p-5 shadow-sm border rounded-5 border-primary">
                    <h2 class="text-center mb-4 text-primary">Halaman Login</h2>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="number" class="form-control bg-info bg-opacity-10 border border-primary" id="username" name="username" placeholder="NIP / NIS" autofocus value="<?= set_value('username') ?>">
                        <?= form_error('username', '<small class="text-danger fst-italic ">', '</small>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control bg-info bg-opacity-10 border border-primary" id="password" name="password" placeholder="Password..." >
                        <?= form_error('password', '<small class="text-danger fst-italic ">', '</small>') ?>
                    </div>
                    <p class="small"><a class="text-primary" href="" >Lupa Password ?</a></p>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0  text-center">Cek Status Pembayaran <a href="signup.html"
                            class="text-primary fw-bold">Disini</a></p>
                    </div>
                </form>        
            </div>
        </div>
        <div class="col-4 green-gradient">
            <img src="<?= base_url('assets/imgs/img/'); ?>login-icon.png" alt="" class=" d-block img-logo">
            <p class="position-absolute bottom-0 end-5 text-center">Copyright &copy; 2022 - SMK NOT FOUND</p>
        </div>
    </div>
</section>

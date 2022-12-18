<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
User &mdash; ATSOFT
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Manajemen User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user/get'); ?>">User</a></li>
            <li class="breadcrumb-item active">Add User</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title"><span><a class="btn btn-secondary" href="<?= base_url('user/get'); ?>">
                                <i class="bi bi-arrow-left"></i></a></span> Form Tambah User </h5>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <form class="row g-3" action="<?= base_url('user/save'); ?>" method="POST">
                                <?= csrf_field(); ?>
                                <div class="col-md-12">
                                    <label for="username" class="form-label">Nama Lengkap *</label>
                                    <input type="text" name="username" class="form-control" id="username" autofocus>
                                </div>

                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" name="email" class="form-control" id="email" autofocus>
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password *</label>
                                    <div class="input-group mb-3" id="show_hide_password">
                                        <input type="password" class="form-control" id="password" name="password" autofocus value="">
                                        <div class="input-group-append">
                                            <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password_conf" class="form-label">Ulangi Password *</label>
                                    <div class="input-group mb-3" id="show_hide_password">
                                        <input type="password" class="form-control" id="password_conf" name="password_conf" autofocus value="">
                                        <div class="input-group-append">
                                            <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                    <label for="notelp" class="form-label">Nomor Telepon *</label>
                                    <input type="text" name="notelp" class="form-control" id="notelp" autofocus>
                                </div>

                                <div class="col-md-12">
                                    <label for="alamat" class="form-label">Alamat *</label>
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                </div> -->

                                <div class="text-center">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit <span></span><i class="ri-send-plane-fill"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Recent Sales -->
    </div>
</section>


<?= $this->endSection('content') ?>
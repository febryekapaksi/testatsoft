<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
Dashboard &mdash; ATSOFT
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Berita</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                                <div class="ps-3">
                                    <a href="<?= base_url('berita/get'); ?>">
                                        <h6><?= $berita; ?></h6>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Kategori Berita</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-card-list"></i>
                                </div>
                                <div class="ps-3">
                                    <a href="<?= base_url('kategori/get'); ?>">
                                        <h6><?= $kategori; ?></h6>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">User</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <a href="<?= base_url('user/get'); ?>">
                                        <h6><?= $user; ?></h6>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>


<?= $this->endSection('content') ?>
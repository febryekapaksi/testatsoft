<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
Kategori &mdash; ATSOFT
<?= $this->endSection() ?>

<!-- Add Kategori Modal -->
<div class="modal fade" id="addKategoriModal" tabindex="-1" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vertically Centered</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Manajemen Kategori</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('kategori/getkategori'); ?>">Kategori</a></li>
            <li class="breadcrumb-item active">Show Kategori</li>
        </ol>
    </nav>
</div><!-- End Page Title -->



<section class="section dashboard">


    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Kategori <span>| <a href="<?= base_url('kategori/add'); ?>" class="btn btn-success">
                                        <i class="bi bi-plus"></i> Tambah Kategori</a></span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="#">#2457</a></th>
                                        <td>Brandon Jacob</td>
                                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                        <td>$64</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKategoriModal" fdprocessedid="hpr32">
                                Vertically centered
                            </a>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>


<?= $this->endSection('content') ?>
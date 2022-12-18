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
            <li class="breadcrumb-item active">Show User</li>
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
                            <h5 class="card-title">Users <span>| <a href="<?= base_url('user/add'); ?>" class="btn btn-success">
                                        <i class="bi bi-plus"></i> Add User</a></span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataUser as $key => $value) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $value->username; ?></td>
                                            <td><?= $value->email; ?></td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>


<?= $this->endSection('content') ?>
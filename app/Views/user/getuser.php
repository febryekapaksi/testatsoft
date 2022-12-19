<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
User &mdash; ATSOFT
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Manajemen User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
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
                            <h5 class="card-title">Users</h5>

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
                                            <td class="text-center" style="width:15%">
                                                <a href="#" onclick="editUser('<?= $value->user_id; ?>')" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i><span class="text"></span>
                                                </a>
                                                <a href="#" onclick="deleteUser('<?= $value->user_id; ?>')" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i><span class="text"></span>
                                                </a>
                                            </td>
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

        <div class="col-lg-4">
            <div class="row">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title" id="usertitle">Tambah User</span></h5>

                        <form class="row g-3" action="" id="tambahuser" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="username" class="form-label">Nama Lengkap *</label>
                                <input type="text" name="username" class="form-control" id="username">
                            </div>

                            <div class="col-md-12">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>

                            <div class="col-md-12">
                                <label for="password" class="form-label">Password *</label>
                                <div class="input-group mb-3" id="show_hide_password">
                                    <input type="password" class="form-control" id="password" name="password" value="">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>

                                <!-- <label for="password_conf" class="form-label">Ulangi Password *</label>
                                <div class="input-group mb-3" id="show_hide_password">
                                    <input type="password" class="form-control" id="password_conf" name="password_conf" value="">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="invalid-feedback">

                                    </div>
                                </div> -->
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
                                <button type="reset" id="reset" class="btn btn-sm btn-secondary">Reset</button>
                                <a href="#" type="submit" id="simpanuser" class="btn btn-sm btn-success">Submit <span></span><i class="ri-send-plane-fill"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let user_id = ''
    $('#reset').on('click', function() {
        $('#reset').text('Reset')
        user_id = ''
        $('#usertitle').text('Tambah User')
    })
    editUser = (params) => {
        $('#reset').text('Batal')
        $('#usertitle').text('Edit User')
        $.ajax({
            url: '<?= base_url(); ?>/user/detail',
            method: 'get',
            data: {
                user_id: params,
            },
            success: function(response) {
                // console.log(response)
                user_id = params
                $('#username').val(response.data.username)
                $('#email').val(response.data.email)
            }
        })
    }

    $('#simpanuser').on('click', function() {

        let url = ''
        if (user_id != '') {
            url = 'edit'
        } else {
            url = 'save'
        }

        $.ajax({
            url: '<?= base_url(); ?>/user/' + url,
            method: 'post',
            data: {
                user_id: user_id,
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val(),
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil",
                    html: response.message,
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                })
            },
            error: function(error) {
                Swal.fire({
                    title: "Gagal",
                    html: error.responseJSON.message,
                    icon: "error"
                })
            }
        })
    });

    deleteUser = (params) => {

        Swal.fire({
            title: "Perhatian",
            html: "Apakah anda yakin?",
            showCancelButton: true,
            icon: "warning"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url(); ?>/user/delete',
                    method: 'post',
                    data: {
                        user_id: params,
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil",
                            html: response.message,
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    }
                })
            }
        })
    }
</script>
<?= $this->endSection('content') ?>
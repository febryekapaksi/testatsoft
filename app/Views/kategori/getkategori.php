<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
Kategori &mdash; ATSOFT
<?= $this->endSection() ?>

<!-- Add Kategori Modal -->
<!-- <div class="modal fade" id="addKategoriModal" tabindex="-1" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
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
</div> -->

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Manajemen Kategori</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
                            <h5 class="card-title">Kategori</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataKategori as $key => $value) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $value->kategori; ?></td>
                                            <td class="text-center">
                                                <a href="#" onclick="editKategori('<?= $value->kategori_id; ?>')" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i><span class="text"></span>
                                                </a>
                                                <a href="#" onclick="deleteKategori('<?= $value->kategori_id; ?>')" class="btn btn-danger btn-sm">
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

        <!-- Right Side Colums -->
        <div class="col-lg-4">
            <div class="row">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title" id="kategorititle">Tambah Kategori</h5>

                        <form class="row g-3" id="tambahkategori" action="" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="kategori" class="form-label">Kategori *</label>
                                <input type="text" name="kategori" class="form-control" id="kategori">
                            </div>

                            <div class="text-center">
                                <button type="reset" class="btn btn-sm btn-secondary"><span id="reset">Reset</span></button>
                                <a href="#" id="simpankategori" type="submit" class="btn btn-sm btn-success">Submit<span></span><i class="ri-send-plane-fill"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let kategori_id = ''
    $('#reset').on('click', function() {
        $('#reset').text('Reset')
        kategori_id = ''
        $('#kategorititle').text('Tambah Kategori')
    })
    editKategori = (params) => {
        $('#reset').text('Batal')
        $('#kategorititle').text('Edit Kategori')
        $.ajax({
            url: '<?= base_url(); ?>/kategori/detail',
            method: 'get',
            data: {
                kategori_id: params,
            },
            success: function(response) {
                // console.log(response)
                kategori_id = params
                $('#kategori').val(response.data.kategori)
            }
        })
    }

    $('#simpankategori').on('click', function() {

        let url = ''
        if (kategori_id != '') {
            url = 'edit'
        } else {
            url = 'save'
        }

        $.ajax({
            url: '<?= base_url(); ?>/kategori/' + url,
            method: 'post',
            data: {
                kategori_id: kategori_id,
                kategori: $('#kategori').val(),
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

    deleteKategori = (params) => {

        Swal.fire({
            title: "Perhatian",
            html: "Apakah anda yakin?",
            showCancelButton: true,
            icon: "warning"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url(); ?>/kategori/delete',
                    method: 'post',
                    data: {
                        kategori_id: params,
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
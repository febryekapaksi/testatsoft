<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
Berita &mdash; ATSOFT
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Manajemen Berita</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active">Berita</li>
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
                            <h5 class="card-title">Berita</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Isi</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataBerita as $key => $value) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $value->judul_berita; ?></td>
                                            <td><?= $value->isi_berita; ?></td>
                                            <td><?= $value->kategori; ?></td>
                                            <td class="text-center">
                                                <a href="#" onclick="editBerita('<?= $value->berita_id; ?>')" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i><span class="text"></span>
                                                </a>
                                                <a href="#" onclick="deleteBerita('<?= $value->berita_id; ?>')" class="btn btn-danger btn-sm">
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
                        <h5 class="card-title" id="beritatitle">Tambah Berita</h5>

                        <form class="row g-3" id="tambahkategori" action="" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="judul" class="form-label">Judul *</label>
                                <input type="text" name="judul" class="form-control" id="judul">
                            </div>
                            <div class="col-md-12">
                                <label for="isi" class="form-label">Isi *</label>
                                <textarea class="form-control" name="isi" id="isi"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="kategori" class="form-label">Kategori *</label>
                                <select class="form-control" name="" id="kategori"></select>
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-sm btn-secondary"><span id="reset">Reset</span></button>
                                <a href="#" id="simpanberita" type="submit" class="btn btn-sm btn-success">Submit<span></span><i class="ri-send-plane-fill"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= base_url(); ?>/berita/kategori',
            method: 'get',
            data: {},
            success: function(response) {
                // console.log(response)
                let option = '<option>Pilih Kategori</option>'
                $.each(response.data, (key, val) => {
                    option += `<option value="${val.kategori_id}">${val.kategori}</option>`
                })
                $('#kategori').append(option)
            }
        })
    })

    let berita_id = ''
    $('#reset').on('click', function() {
        $('#reset').text('Reset')
        berita_id = ''
        $('#beritatitle').text('Tambah Berita')
    })

    editBerita = (params) => {
        $('#reset').text('Batal')
        $('#beritatitle').text('Edit Berita')
        $.ajax({
            url: '<?= base_url(); ?>/berita/detail',
            method: 'get',
            data: {
                berita_id: params,
            },
            success: function(response) {
                // console.log(response)
                berita_id = params
                $('#judul').val(response.data.judul_berita)
                $('#isi').val(response.data.isi_berita)
                $('#kategori').val(response.data.kategori_id)
            }
        })
    }

    $('#simpanberita').on('click', function() {

        let url = ''
        if (berita_id != '') {
            url = 'edit'
        } else {
            url = 'save'
        }

        $.ajax({
            url: '<?= base_url(); ?>/berita/' + url,
            method: 'post',
            data: {
                berita_id: berita_id,
                judul_berita: $('#judul').val(),
                isi_berita: $('#isi').val(),
                kategori_id: $('#kategori').val(),
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

    deleteBerita = (params) => {

        Swal.fire({
            title: "Perhatian",
            html: "Apakah anda yakin?",
            showCancelButton: true,
            icon: "warning"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url(); ?>/berita/delete',
                    method: 'post',
                    data: {
                        berita_id: params,
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
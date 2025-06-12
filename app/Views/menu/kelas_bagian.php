<?= $this->extend('templates/index') ?>

<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h4 class="mb-1">Setting</h4>
        <div class="section-header-breadcrumb">
            <ol class="breadcrumb bg-transparent px-0 my-0 py-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/menu/">Dashboard</a></li>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/menu/settings/">Settings</a></div>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/KelasBagian/index/">Daftar Kelas</a></li>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('tambah-kelas') ?>
<?= $this->include('menu/modals/tambah_kelasModal') ?>
<?= $this->include('menu/modals/editKelasModal') ?>
<section class="section">
    <h2 class="section-title">Manage kelas</h2>
    <p class="section-lead">Tambah kelas, edit, atau hapus data kelas</p>

    <div class="row">
        <div class="col">
            <div class="card card-statistic-1">
                <div class="col mt-3">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahKelas"><i class="fas fa-plus"></i> Tambah Kelas</a>
                </div>

                <div class="row mx-1">
                    <div class="col my-3">
                        <!-- Alert -->
                        <?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                    <span>×</span>
                                </button>
                                <div class="text-small text-left">
                                    <?= session()->getFlashdata('berhasil'); ?>
                                </div>
                            </div>
                        <?php elseif (!empty(session()->getFlashdata('update'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                    <span>×</span>
                                </button>
                                <div class="text-small text-left">
                                    <?= session()->getFlashdata('update'); ?>
                                </div>
                            </div>
                        <?php elseif (!empty(session()->getFlashdata('hapus'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                    <span>×</span>
                                </button>
                                <div class="text-small text-left">
                                    <?= session()->getFlashdata('hapus'); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- KELAS 7 -->
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th scope="row" class="col-1 text-center text-primary">No</th>
                                        <th scope="row" class="col-1 text-center text-primary">Kelas</th>
                                        <th scope="row" class="col-1 text-center text-primary">L/P</th>
                                        <th scope="row" class="col-4 text-center text-primary">Wali Kelas</th>
                                        <th scope="row" class="col-2 text-center text-primary">No Handphone</th>
                                        <th scope="row" class="col-1 text-center text-primary">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div>
                                        <?php $no = 1;
                                        foreach ($dataKelas_Tujuh as $data) : ?>
                                            <tr>
                                                <th class="text-center align-middle"><?= $no++ ?></th>
                                                <!-- style="font-size: 20px;" -->
                                                <th class="text-center align-middle"><?= $data->kelas . "-" . $data->bagian ?></th>
                                                <td class="align-middle text-center">
                                                    <?php if ($data->gender == "laki-laki") : echo "L";
                                                    elseif ($data->gender == "perempuan") : echo "P";
                                                    endif ?>
                                                </td>
                                                <td class="align-middle"><?= $data->wali_kelas ?></td>
                                                <td class="align-middle text-center"><?= $data->nomorHp ?></td>
                                                <!-- Tombol Aksi -->
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-warning btn-icon pr-1" data-id="<?= $data->id ?>" data-kelas="<?= $data->kelas ?>" data-bagian="<?= $data->bagian ?>" data-cewek="<?= $data->gender ?>" data-wali_kelas="<?= $data->wali_kelas ?>" data-nomor_hp="<?= $data->nomorHp ?>" id="TomboleditKelas" data-toggle="modal" data-target="#editKelas" title="Edit"><i class="fa fa-pencil-alt text-white"></i>&nbsp;</button>
                                                    <form action="<?= base_url() ?>/KelasBagian/delete/<?= $data->id ?>" method="POST" class="d-inline">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger btn-icon" title="Hapus"><i class="fa fa-trash-alt text-white"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </div>
                                </tbody>
                            </table>
                        </div>

                        <!-- KELAS 8 -->
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th scope="row" class="col-1 text-center text-primary">No</th>
                                        <th scope="row" class="col-1 text-center text-primary">Kelas</th>
                                        <th scope="row" class="col-1 text-center text-primary">L/P</th>
                                        <th scope="row" class="col-4 text-center text-primary">Wali Kelas</th>
                                        <th scope="row" class="col-2 text-center text-primary">No Handphone</th>
                                        <th scope="row" class="col-1 text-center text-primary">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div>
                                        <?php $no = 1;
                                        foreach ($dataKelas_Delapan as $data) : ?>
                                            <tr>
                                                <th class="text-center align-middle"><?= $no++ ?></th>
                                                <!-- style="font-size: 20px;" -->
                                                <th class="text-center align-middle"><?= $data->kelas . "-" . $data->bagian ?></th>
                                                <td class="align-middle text-center">
                                                    <?php if ($data->gender == "laki-laki") : echo "L";
                                                    elseif ($data->gender == "perempuan") : echo "P";
                                                    endif ?>
                                                </td>
                                                <td class="align-middle"><?= $data->wali_kelas ?></td>
                                                <td class="align-middle text-center"><?= $data->nomorHp ?></td>
                                                <!-- Tombol Aksi -->
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-warning btn-icon pr-1" data-id="<?= $data->id ?>" data-kelas="<?= $data->kelas ?>" data-bagian="<?= $data->bagian ?>" data-cewek="<?= $data->gender ?>" data-wali_kelas="<?= $data->wali_kelas ?>" data-nomor_hp="<?= $data->nomorHp ?>" id="TomboleditKelas" data-toggle="modal" data-target="#editKelas" title="Edit"><i class="fa fa-pencil-alt text-white"></i>&nbsp;</button>
                                                    <form action="<?= base_url() ?>/KelasBagian/delete/<?= $data->id ?>" method="POST" class="d-inline">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger btn-icon" title="Hapus"><i class="fa fa-trash-alt text-white"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </div>
                                </tbody>
                            </table>
                        </div>

                        <!-- KELAS 9 -->
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th scope="row" class="col-1 text-center text-primary">No</th>
                                        <th scope="row" class="col-1 text-center text-primary">Kelas</th>
                                        <th scope="row" class="col-1 text-center text-primary">L/P</th>
                                        <th scope="row" class="col-4 text-center text-primary">Wali Kelas</th>
                                        <th scope="row" class="col-2 text-center text-primary">No Handphone</th>
                                        <th scope="row" class="col-1 text-center text-primary">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div>
                                        <?php $no = 1;
                                        foreach ($dataKelas_Sembilan as $data) : ?>
                                            <tr>
                                                <th class="text-center align-middle"><?= $no++ ?></th>
                                                <!-- style="font-size: 20px;" -->
                                                <th class="text-center align-middle"><?= $data->kelas . "-" . $data->bagian ?></th>
                                                <td class="align-middle text-center">
                                                    <?php if ($data->gender == "laki-laki") : echo "L";
                                                    elseif ($data->gender == "perempuan") : echo "P";
                                                    endif ?>
                                                </td>
                                                <td class="align-middle"><?= $data->wali_kelas ?></td>
                                                <td class="align-middle text-center"><?= $data->nomorHp ?></td>
                                                <!-- Tombol Aksi -->
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-warning btn-icon pr-1" data-id="<?= $data->id ?>" data-kelas="<?= $data->kelas ?>" data-bagian="<?= $data->bagian ?>" data-cewek="<?= $data->gender ?>" data-wali_kelas="<?= $data->wali_kelas ?>" data-nomor_hp="<?= $data->nomorHp ?>" id="TomboleditKelas" data-toggle="modal" data-target="#editKelas" title="Edit"><i class="fa fa-pencil-alt text-white"></i>&nbsp;</button>
                                                    <form action="<?= base_url() ?>/KelasBagian/delete/<?= $data->id ?>" method="POST" class="d-inline">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger btn-icon" id="swal-6" title="Hapus"><i class="fa fa-trash-alt text-white"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url(); ?>/templates/node_modules/jquery/dist/jquery.min.js"></script>
<script>
    $(document).on("click", "#TomboleditKelas", function() {
        $(".modal-body #id").val($(this).data('id'));
        $(".modal-body #kelas").val($(this).data('kelas'));
        $(".modal-body #bagian").val($(this).data('bagian'));
        $(".modal-body #gender").val($(this).data('gender'));
        $(".modal-body #wali_kelas").val($(this).data('wali_kelas'));
        $(".modal-body #nomorHp").val($(this).data('nomor_hp'));
    });
</script>

<?= $this->endSection() ?>
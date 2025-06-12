<?= $this->extend('templates/index') ?>

<!-- User Siswa ---------------------------------------------------------------------------------------------------------- -->
<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h1>Users Siswa</h1>
        <div class="section-header-breadcrumb">
            <ol class="breadcrumb bg-transparent px-0 my-0 py-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/menu/">Dashboard</a></li>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/siswa/userSiswa/">Daftar kelas 9</a></div>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('kelasSembilan'); ?>
<?php if ((session()->levelId == 1) || (session()->levelId == 2)) : ?>
    <section class="section">
        <div class="row mx-0 px-0">
            <div class="col px-0 mx-0">
                <h2 class="section-title mt-0 pt-2"><?= $judul ?></h2>
                <p class="section-lead">NIS, nama lengkap, dan detail siswa</p>
            </div>
            <div class="col px-0 mx-0">
                <form action="<?= base_url() ?>/siswa/KelasSembilan/" method="POST">
                    <div class="input-group mb-3 pt-1">
                        <input name="keyword_siswa" class="form-control" type="Search" placeholder="Cari NIS atau Nama" aria-label="Search" data-width="250" style="border-radius: 20px 0 0 20px;">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-icon px-3" type="submit" style="border-radius: 0 20px 20px 0;"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-statistic-1">
                    <!-- JUDUL -->
                    <div class="row card-body pl-0 mr-4 ml-2">
                        <div class="col">
                            <div class="card-header px-0 mx-0">
                                <h5 class="text-primary">
                                    <i class="fas fa-phone-square text-primary" style="font-size: 20px;"></i>
                                    &nbsp;<?= $judul ?>List Siswa
                            </div>
                        </div>
                    </div>

                    <!-- TABEL SPP -->
                    <div class="row mx-1">
                        <div class="col mt-2">

                            <!-- Alert -->
                            <?php if (!empty(session()->getFlashdata('hapus'))) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                        <span>×</span>
                                    </button>
                                    <div class="text-small text-left">
                                        <?= session()->getFlashdata('hapus'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Select Kelas -->
                            <form action="<?= base_url() ?>/siswa/pilih_bagianSembilan/<?= @$option_bagian ?>" method="post">
                                <div class="col mb-3 px-0 mx-0">
                                    <div class="input-group">
                                        <select name="pilih_bagian" class="custom-select">
                                            <option selected disabled>Pilih Kelas</option>
                                            <option value="<?= $kabeh_bagian ?>">All</option>
                                            <?php $no = 0;
                                            foreach ($dataBagian as $bagian) :
                                                foreach ($bagian as $bgn) {
                                                    $no++;
                                                    $select = "";
                                                    if (isset($_GET['pilih_bagian'])) :
                                                        $option_bagian = trim($_GET['pilih_bagian']);
                                                        if ($option_bagian == ($bgn)) {
                                                            $select = "selected";
                                                        };
                                                    endif; ?>
                                                    <option <?= $select ?> value="<?= $bgn ?>">Kelas 9-<?= $bgn ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Pilih</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Select Kelas -->

                                <!-- Tabel User Siswa -->
                                <table class="table table-responsive table-striped table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th scope="row" class="col-1 align-middle text-center text-primary">No</th>
                                            <th scope="row" class="col-2 align-middle text-center text-primary">NIS</th>
                                            <th scope="row" class="col-4 align-middle text-center text-primary fullname">Nama Lengkap</th>
                                            <th scope="row" class="col-1 align-middle text-center text-primary">L/P</th>
                                            <th scope="row" class="col-1 align-middle text-center text-primary">Kelas</th>
                                            <th scope="row" class="col-1 align-middle text-center text-primary">Asrama</th>
                                            <th scope="row" class="col-1 align-middle text-center text-primary" data-width="50px">Status</th>
                                            <th scope="row" class="col align-middle text-center text-primary aksi">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabeloke">
                                        <?php $no = 1 + (10 * (@$current_page - 1));
                                        foreach ($dataStudents as $dataStudent) : ?>
                                            <tr>
                                                <th scope="row" class="align-middle text-center"><?= $no++; ?></th>
                                                <td class="align-middle text-center"><?= $dataStudent->username ?></td>
                                                <td class="align-middle"><?= $dataStudent->fullname ? ucwords(strtolower($dataStudent->fullname)) : ucwords($dataStudent->fullname) ?></td>
                                                <td class="align-middle text-center"> <?= ($dataStudent->gender == "laki-laki") ? "L" : "P" ?></td>
                                                <td class="align-middle text-center"><?= @strtoupper($dataStudent->kelas) . " " . @strtoupper($dataStudent->bagian) ?></td>
                                                <td class="align-middle text-center"><?= @strtoupper($dataStudent->asrama) . " " . @strtoupper($dataStudent->kode) ?></td>
                                                <td class="align-middle text-center">
                                                    <?php if ($dataStudent->status == 'aktif') : ?>
                                                        <span class="badge badge-success text-small py-0" title="aktif" style="box-shadow: none;">active</span>
                                                    <?php elseif ($dataStudent->status == 'boyong') : ?>
                                                        <span class="badge badge-danger text-small py-0" title="boyong" style="box-shadow: none;">out</span>
                                                    <?php endif ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="<?= base_url() ?>/siswa/detail/<?= $dataStudent->username ?>" class="btn btn-sm btn-info pr-1"><i class="far fa-eye text-white"></i> </a>
                                                    <a id="deleteUserSiswa" data-username="<?= $dataStudent->username ?>" data-toggle="modal" data-target="#confirmDelete" class="btn btn-sm btn-danger pr-2" title="Delete"><i class="far fa-trash-alt text-white"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer my-0 py-0">
                        <?= $pager->links('pages_absen_harian', 'pager_users'); ?>
                    </div>
                    <!-- End of Tabel User Siswa -->

                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- Modal Harus Login Dulu -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning">Yakin?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>

                <div class="modal-body mb-0">
                    <span>
                        Yakin mau menghapus user ini?
                    </span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-2">Nggak jadi</button>
                    <form action="<?= base_url() ?>/siswa/detail/<?= @$dataStudent->username ?>" method="POST" class="d-inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-warning"><i class="far fa-trash-alt text-white"></i>&nbsp;Yakin dong</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>
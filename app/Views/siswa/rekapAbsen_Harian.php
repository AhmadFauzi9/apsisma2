<?= $this->extend('templates/index'); ?>

<!-- ABSENSI SISWA ------------------------------------------------------------------------ -->

<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h1>Absensi</h1>
        <div class="section-header-breadcrumb">
            <ol class="breadcrumb bg-transparent px-0 my-0 py-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/pilih_insertAbsen/">Input</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/rekapAbsen_Harian/">Absen Harian</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/rekapAbsen_Bulanan/">Rekap Bulanan</a></li>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>


<?= $this->section('rekapAbsen_Harian'); ?>
<!-- Absensi Per Siswa Per Hari -------------------------------------------------------------->
<section class="section">
    <div class="row mx-0 px-0">
        <div class="col px-0 mx-0">
            <h2 class="section-title mt-0 pt-2">Absensi Harian</h2>
            <p class="section-lead">Absensi tiap hari semua kelas</p>
        </div>
        <div class="col px-0 mx-0">
            <form action="<?= base_url() ?>/absensi/rekapAbsen_Harian/" method="POST">
                <div class="input-group mb-3 pt-1">
                    <input name="keyword_absen" class="form-control" type="search" placeholder="Cari NIS atau Nama" aria-label="Search" data-width="250" style="border-radius: 20px 0 0 20px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-icon px-4" type="submit" style="border-radius: 0 20px 20px 0;"><i class="fas fa-search"></i></button>
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
                                <i class="fas fa-clipboard-list text-primary" style="font-size: 20px;"></i>
                                &nbsp;Rekap Absen Harian
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- TABEL Absensi Per Siswa Per Hari -->
                <div class="row mx-1">
                    <div class="col mt-3 mb-1">
                        <div class="row">
                            <div class="col card-statistic-1 mx-0 pb-3">

                                <!-- Alert -->
                                <?php if (!empty(session()->getFlashdata('update'))) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button class="close" data-dismiss="alert" style="margin-top: -2px;"><span>×</span></button>
                                        <div class="text-left">
                                            <?= session()->update; ?>
                                        </div>
                                    </div>
                                <?php elseif (!empty(session()->getFlashdata('berhasil'))) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button class="close" data-dismiss="alert" style="margin-top: -2px;"><span>×</span></button>
                                        <div class="text-left">
                                            <?= session()->berhasil; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Pilih Kelas dan bagian -->
                                <form action="<?= base_url() ?>/absensi/pilih_kelas/" method="post">
                                    <?php $validationAbsen = \Config\Services::validation(); ?>
                                    <?php csrf_field() ?>

                                    <div class="row px-0 mx-0">
                                        <!-- Select Kelas -->
                                        <div class="col px-0 mx-0">
                                            <div class="input-group mb-2">
                                                <select name="pilih_kelas" value="<?= old('pilih_kelas') ?>" class="custom-select <?= $validationAbsen->hasError('pilih_kelas') ? 'is-invalid' : null ?>">
                                                    <option selected disabled>Kelas</option>
                                                    <?php
                                                    foreach ($dataKelas as $kelas) :
                                                        foreach ($kelas as $kls) {
                                                            $select_kelas = "";
                                                            if (isset($_GET['pilih_kelas'])) :
                                                                $option_kelas = $_GET['pilih_kelas'];
                                                                if ($option_kelas == $kls) {
                                                                    $select_kelas = "selected";
                                                                };
                                                            endif; ?>
                                                            <option <?= $select_kelas ?> value="<?= $kls ?>">
                                                                Kelas
                                                                <?php if ($kls == "VII") : echo 7;
                                                                elseif ($kls == "VIII") : echo 8;
                                                                elseif ($kls == "IX") : echo 9;
                                                                endif; ?>
                                                            </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback text-left">
                                                    <?= $validationAbsen->getError('pilih_kelas') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Select Bagian -->
                                        <div class="col px-0 mx-0">
                                            <div class="input-group mb-2">
                                                <select name="pilih_bagian" value="<?= old('pilih_bagian') ?>" id="inputGroupSelect04" class="custom-select <?= $validationAbsen->hasError('pilih_bagian') ? 'is-invalid' : null ?>" style="border-radius: 0 0 0 0;">
                                                    <option value="all" selected disabled>Bagian</option>
                                                    <option value="all">All</option>
                                                    <?php
                                                    foreach ($dataBagian as $bagian) :
                                                        foreach ($bagian as $bgn) {
                                                            $select_bagian = "";
                                                            if (isset($_GET['pilih_bagian'])) :
                                                                $option_bagian = $_GET['pilih_bagian'];
                                                                if ($option_bagian == $bgn) {
                                                                    $select_bagian = "selected";
                                                                };
                                                            endif; ?>
                                                            <option <?= $select_bagian ?> value="<?= $bgn ?>"><?= $bgn ?></option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback text-left">
                                                    <?= $validationAbsen->getError('pilih_bagian') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-0 mx-0">
                                        <!-- Tanggal -->
                                        <div class="col px-0 mx-0">
                                            <div class="input-group mb-4">
                                                <?php $tgl = date('Y/m/d') ?>
                                                <input name="tanggal" type="date" value="<?= old('tanggal') ?>" class="form-control <?= $validationAbsen->hasError('tanggal') ? 'is-invalid' : null ?>" style="border-radius: 0">
                                                <!-- Button -->
                                                <div class="input-group-append px-0 mx-0">
                                                    <button type="submit" class="btn btn-primary">Pilih</button>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= $validationAbsen->getError('tanggal') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- End of Pilih kelas dan bagian -->
                            </div>
                        </div>

                        <div class="col mb-3 mx-0 px-0">
                            <!-- Tombol Edit Absen -->
                            <div class="col px-0 py-0">
                                <a href="<?php base_url() ?>/absensi/toeditAbsen/" class="btn btn-warning px-4 mb-3">Edit Absen</a>
                                <div class="py-2 alert alert-info" style="font-style: italic;">
                                    <i class="fas fa-exclamation-circle" style="font-size: 15px;">&nbsp;</i> Jika ingin edit, pilih Kelas dan bagian terlebih dahulu
                                </div>
                            </div>
                            <!-- <div class="col px-0 py-0">
                                <a href="#" class="btn btn-warning px-4 mb-3" data-toggle="modal" data-target="#editAbsen">Edit Absen</a>
                                <div class="py-2 alert alert-info" style="font-style: italic;">
                                    <i class="fas fa-exclamation-circle" style="font-size: 15px;">&nbsp;</i> Jika ingin edit, pilih Kelas dan bagian terlebih dahulu
                                </div>
                            </div> -->

                            <div class="table-responsive mb-3">
                                <table id="rekapHarian" class="table table-striped table-bordered table-md">
                                    <!-- Table Header -->
                                    <tr>
                                        <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">No</th>
                                        <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">NIS</th>
                                        <th rowspan="2" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Nama</th>
                                        <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Kelas</th>
                                        <th rowspan="2" class="col-2 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Tanggal</th>
                                        <th colspan="5" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Absen</th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 text-center text-white bg-danger" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">A</th>
                                        <th scope="row" class="col-1 text-center text-white bg-warning" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">S</th>
                                        <th scope="row" class="col-1 text-center text-white bg-info" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">I</th>
                                        <th scope="row" class="col-1 text-center text-white bg-secondary" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">T</th>
                                        <th scope="row" class="col-1 text-center text-white bg-success" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><i class="fas fa-check"></i></th>
                                    </tr>
                                    <!-- End of Table Header -->
                                    <?php $no = 1 + (10 * ($current_page - 1));
                                    foreach ($dataAbsensi as $dataAbsen) : ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $no++ ?></th>
                                            <td class="pl-3 align-middle"><?= $dataAbsen->username ?></td>
                                            <td class="pl-3 align-middle"><?= @ucwords(@$dataAbsen->fullname) ?></td>
                                            <td class="pl-3 align-middle text-center"><?= @strtoupper(@$dataAbsen->kelas . "-" . @$dataAbsen->bagian) ?></td>
                                            <td class="pl-3 align-middle text-center"><?= date('d-m-Y', strtotime($dataAbsen->tanggal)) ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'alpa') ? '<div class="badge badge-danger py-1">Alpa</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'sakit') ? '<div class="badge badge-warning py-1">Sakit</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'izin') ? '<div class="badge badge-info py-1">Izin</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'telat') ? '<div class="badge badge-secondary py-1">Terlambat</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'masuk') ? '<div class="badge badge-success py-1">Hadir</div>' : "" ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- Jumlah -->
                                    <tr style="border: 1px solid rgba(0, 0, 0, 0.1);"></tr>
                                </table>
                            </div>
                            <hr class="mt-4">
                            <div class="card-footer my-0 py-0 px-0 mx-0">
                                <!-- Pager -->
                                <?= $pager->links('pages_absen_harian', 'pager_users'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body bg-white pt-1 pb-1">
        <div class="section-title ">Rekap Absen</div>
        <div class="form-group">
            <form action="<?= base_url() ?>/absensi/rekapAbsen/" method="post">
                <div class="row mb-3 mx-0 px-0">
                    <div class="input-group">
                        <select name="pilih_bulan" class="custom-select">
                            <option selected disabled>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <div class="input-group-append px-0">
                            <button class="btn btn-primary btn-block" type="submit">Rekap</button>
                        </div>
                    </div>
                </div>
                <span class="my-0 py-0 text-info" style="font-style: italic;">
                    <span>&mdash;</span>&nbsp; Rekap untuk memindahkan data ke rekap absen bulanan
                </span>
            </form>
        </div>
    </div>
</section>

<!-- <script>
    $(document).ready(function() {
        $('#rekapHarian').DataTable();
    });
</script> -->

<!-- MODAL -->
<?= $this->include('siswa/modals/editAbsenModal') ?>

<?= $this->endSection(); ?>
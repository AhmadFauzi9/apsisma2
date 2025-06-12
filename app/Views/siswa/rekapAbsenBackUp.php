<?= $this->extend('templates/index'); ?>

<!-- ABSENSI SISWA ------------------------------------------------------------------------ -->

<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h4 class="mb-1">Absensi</h4>
        <div class="section-header-breadcrumb">
            <ol class="breadcrumb bg-transparent my-0 py-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/pilih_insertAbsen/"><i class="fa fa-clipboard-list"></i> Insert Absen</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/guru/absenSiswa/"><i class="fas fa-list"></i> Absen Hari ini</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/rekapAbsen/"><i class="fas fa-archive"></i> Rekap Absen</a></li>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('absen-siswa-guru'); ?>
<!-- Persentase perbulan-->
<section class="section">
    <div class="row">

        <!-- Absensi Harian -->
        <div class="col">
            <div class="card px-0">
                <div class="card-header">
                    <h4>Presentase Bulanan</h4>
                </div>

                <!-- Card Color -->
                <div id="maret" class="card-body px-3 py-0">
                    <div class="row">
                        <div class="col-md-3 pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-success card-statistic-1 ">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-check-circle fa-2x text-success"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Masuk</h4>
                                    </div>
                                    <div class="card-body text-white">
                                        <?php
                                        $kalender = CAL_GREGORIAN;
                                        $a_bulan = date('m');
                                        $a_tahun = date('Y');
                                        $jum_hari = cal_days_in_month($kalender, $a_bulan, $a_tahun);
                                        $persen = (@$masuk / ($jum_hari - 4) * 100);
                                        echo round($persen, 2) . "%"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Alpa -->
                        <div class="col-md-3 col-md-auto pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-danger card-statistic-1">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-times-circle fa-2x text-danger" aria-hidden="true"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Alpa</h4>
                                    </div>
                                    <div class="card-body text-white">
                                        <?php
                                        $kalender = CAL_GREGORIAN;
                                        $a_bulan = date('m');
                                        $a_tahun = date('Y');
                                        $jum_hari = cal_days_in_month($kalender, $a_bulan, $a_tahun);
                                        $persen = (@$alpa / ($jum_hari - 4) * 100);
                                        echo round($persen, 2) . "%"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sakit -->
                        <div class="col-md-3 col-md-auto pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-warning card-statistic-1">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-frown fa-2x text-warning" aria-hidden="true"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Sakit</h4>
                                    </div>
                                    <div class="card-body text-white">
                                        <?php
                                        $kalender = CAL_GREGORIAN;
                                        $a_bulan = date('m');
                                        $a_tahun = date('Y');
                                        $jum_hari = cal_days_in_month($kalender, $a_bulan, $a_tahun);
                                        $persen = (@$sakit / ($jum_hari - 4) * 100);
                                        echo round($persen, 2) . "%"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Izin -->
                        <div class="col-md-3 col-md-auto pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-info card-statistic-1">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-info fa-2x text-info" aria-hidden="true"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Izin</h4>
                                    </div>
                                    <div class="card-body text-white">
                                        <?php
                                        $kalender = CAL_GREGORIAN;
                                        $a_bulan = date('m');
                                        $a_tahun = date('Y');
                                        $jum_hari = cal_days_in_month($kalender, $a_bulan, $a_tahun);
                                        $persen = (@$izin / ($jum_hari - 4) * 100);
                                        echo round($persen, 2) . "%"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <hr>
                <div class="card-header pt-0">
                    <p class="px-0 py-0 my-0">Rekap absensi bulan : <?= $nama_bulan[date('n')]; ?></p>
                </div>
            </div>
        </div>
        <!-- End of Absensi Harian -->
    </div>
</section>

<!-- Absensi Per Siswa Per Hari -------------------------------------------------------------->
<section class="section">
    <div class="row">
        <div class="col">
            <div class="card card-statistic-1">
                <!-- JUDUL -->
                <div class="row card-body pl-0 mr-4 ml-2">
                    <div class="col">
                        <div class="card-header px-0 mx-0">
                            <h5 class="text-primary">
                                <i class="fas fa-clipboard-list text-primary" style="font-size: 25px;"></i>
                                &nbsp;Rekap Absen
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
                                <?php endif; ?>

                                <!-- Pilih Kelas dan bagian -->
                                <form action="<?= base_url() ?>/guru/pilih_kelas/" method="post">
                                    <?php $validationAbsen = \Config\Services::validation(); ?>
                                    <?php csrf_field() ?>

                                    <div class="row px-0 mx-0">
                                        <!-- Select Kelas -->
                                        <div class="col px-0 mx-0">
                                            <div class="form-group mb-2">
                                                <select name="pilih_kelas" value="<?= old('pilih_kelas') ?>" class="custom-select <?= $validationAbsen->hasError('pilih_kelas') ? 'is-invalid' : null ?>" style="border-radius: 20px 0 0 20px;">
                                                    <option selected disabled>Kelas</option>
                                                    <?php
                                                    foreach ($dataKelas as $kelas) :
                                                        $select_kelas = "";
                                                        if (isset($_GET['pilih_kelas'])) :
                                                            $option_kelas = $_GET['pilih_kelas'];
                                                            if ($option_kelas == $kelas) {
                                                                $select_kelas = "selected";
                                                            };
                                                        endif; ?>
                                                        <option <?= $select_kelas ?> value="<?= $kelas ?>">
                                                            Kelas
                                                            <?php if ($kelas == "VII") : echo 7;
                                                            elseif ($kelas == "VIII") : echo 8;
                                                            elseif ($kelas == "IX") : echo 9;
                                                            endif; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback text-left">
                                                    <?= $validationAbsen->getError('pilih_kelas') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Select Bagian -->
                                        <div class="col px-0 mx-0">
                                            <div class="form-group mb-2">
                                                <select name="pilih_bagian" value="<?= old('pilih_bagian') ?>" class="custom-select <?= $validationAbsen->hasError('pilih_bagian') ? 'is-invalid' : null ?>" style="border-radius: 0 0 0 0;">
                                                    <option value="all" selected disabled>Bagian</option>
                                                    <option value="all">All</option>
                                                    <?php
                                                    foreach ($dataBagian as $bagian) :
                                                        $select_bagian = "";
                                                        if (isset($_GET['pilih_bagian'])) :
                                                            $option_bagian = $_GET['pilih_bagian'];
                                                            if ($option_bagian == $bagian) {
                                                                $select_bagian = "selected";
                                                            };
                                                        endif; ?>
                                                        <option <?= $select_bagian ?> value="<?= $bagian ?>"><?= $bagian ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback text-left">
                                                    <?= $validationAbsen->getError('pilih_bagian') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="col-3 px-0 mx-0">
                                            <button type="submit" class="btn btn-primary btn-block py-2" style="margin-left: auto; margin-right: auto; border-radius: 0 20px 20px 0;">&nbsp;Pilih&nbsp;</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End of Pilih kelas dan bagian -->

                                <hr class="mt-0">
                                <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                    <div class="col">
                                        <div class="nav-link px-0"><strong>Kelas</strong></div>
                                    </div>
                                    <div class="col-lg-9 col-md-auto">
                                        <div class="py-2 align-middle">:<span>&nbsp;</span>
                                            <?= (@session()->data->kelas) ? @strtoupper(@session()->data->kelas . "-" . @session()->data->bagian) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-0 mx-0" style="background-color: #fff;">
                                    <div class="col">
                                        <div class="nav-link px-0"><strong>ًWali Kelas</strong></div>
                                    </div>
                                    <div class="col-lg-9 col-md-auto">
                                        <div class="py-2 align-middle">:<span>&nbsp;</span>
                                            <?= (@session()->data->waliKelas) ? @ucwords(@session()->data->waliKelas) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                    <div class="col">
                                        <div class="nav-link px-0"><strong>No Telp</strong></div>
                                    </div>
                                    <div class="col-lg-9 col-md-auto">
                                        <div class="py-2 align-middle">:<span>&nbsp;</span>
                                            <?= (@session()->data->nomorHp) ? @ucwords(@session()->data->nomorHp) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-3 mx-0 px-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-md">
                                    <!-- Table Header -->
                                    <tr class="">
                                        <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">No</th>
                                        <th rowspan="2" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Nama</th>
                                        <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Kelas</th>
                                        <th rowspan="2" class="col-2 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Tanggal</th>
                                        <th colspan="5" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Absen</th>
                                    </tr>
                                    <tr class="">
                                        <th scope="row" class="col-1 text-center text-white bg-danger" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">A</th>
                                        <th scope="row" class="col-1 text-center text-white bg-warning" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">S</th>
                                        <th scope="row" class="col-1 text-center text-white bg-info" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">I</th>
                                        <th scope="row" class="col-1 text-center text-white bg-secondary" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">T</th>
                                        <th scope="row" class="col-1 text-center text-white bg-success" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><i class="fas fa-check"></i></th>
                                    </tr>
                                    <!-- End of Table Header -->
                                    <?php $no = 1;
                                    foreach ($dataAbsensi as $dataAbsen) : ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $no++ ?></th>
                                            <td class="pl-3 align-middle"><?= @ucwords(@$dataAbsen->fullname) ?></td>
                                            <td class="pl-3 align-middle text-center"><?= @strtoupper(@$dataAbsen->kelas . "-" . @$dataAbsen->bagian) ?></td>
                                            <td class="pl-3 align-middle text-center"><?= $dataAbsen->tanggal ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'alpa') ? '<div class="badge badge-danger py-1">Alpa</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'sakit') ? '<div class="badge badge-warning py-1">Sakit</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'izin') ? '<div class="badge badge-info py-1">Izin</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'telat') ? '<div class="badge badge-secondary py-1">Terlambat</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'masuk') ? '<div class="badge badge-success py-1">Hadir</div>' : "" ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- Jumlah -->
                                    <tr>
                                        <th scope="row" colspan="4" class="align-middle text-right pr-2 text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)">TOTAL</th>
                                        <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)"><?= @$alpa ?></td>
                                        <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)"><?= @$sakit ?></td>
                                        <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)"><?= @$izin ?></td>
                                        <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)"><?= @$telat ?></td>
                                        <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)"><?= @$masuk ?></td>
                                    </tr>
                                </table>
                            </div>
                            <hr class="mt-4">
                            <div class="card-footer my-0 py-0">
                                <!-- Pager -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-sm justify-content-end">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODAL -->
<?= $this->include('guru/modals/editAbsenModal') ?>

<?= $this->endSection(); ?>
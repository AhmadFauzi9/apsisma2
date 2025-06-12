<?= $this->extend('templates/index'); ?>

<!-- ABSENSI SISWA ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('absensi-siswa'); ?>
<?php if (session()->levelId == 3) : ?>
    <section class="section">
        <div class="row">

            <!-- Persentase Bulanan -->
            <div class="col-lg-4 col-md-auto">
                <div class="card px-0">
                    <div class="card-header">
                        <h4>Presentase Bulanan</h4>
                    </div>

                    <div class="card-body px-0 py-0">
                        <!-- Background Warna -->
                        <div class="col pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-primary card-statistic-1 ">
                                <div class="card-icon bg-white">
                                    <i class="far fa-user text-primary"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Februari</h4>
                                    </div>
                                    <div class="card-body text-white">
                                        98%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Keterangan -->
                        <hr>
                        <div class="card-header pt-0">
                            <p class="text-small text-primary px-0 py-0 my-0">Presentase kehadiran dalam satu bulan</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Persentase Bulanan -->

            <!-- Absensi Harian -->
            <div class="col">
                <div class="card px-0">
                    <div class="card-header">
                        <h4>Absensi Harian</h4>
                    </div>

                    <div class="card-body px-3 py-0">
                        <!-- Background Warna -->
                        <div class="row">
                            <!-- Alpa -->
                            <div class="col-md-4 col-md-auto pb-0 pt-2 mx-0 my-0">
                                <div class="card my-2 bg-danger card-statistic-1">
                                    <div class="card-icon bg-white">
                                        <i class="fa fa-times-circle fa-2x text-danger" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="text-white">Alpa</h4>
                                        </div>
                                        <div class="card-body text-white">
                                            2
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sakit -->
                            <div class="col-md-4 col-md-auto pb-0 pt-2 mx-0 my-0">
                                <div class="card my-2 bg-warning card-statistic-1">
                                    <div class="card-icon bg-white">
                                        <i class="fa fa-frown fa-2x text-warning" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="text-white">Sakit</h4>
                                        </div>
                                        <div class="card-body text-white">
                                            1
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Izin -->
                            <div class="col-md-4 col-md-auto pb-0 pt-2 mx-0 my-0">
                                <div class="card my-2 bg-success card-statistic-1">
                                    <div class="card-icon bg-white">
                                        <i class="fa fa-info fa-2x text-success" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="text-white">Izin</h4>
                                        </div>
                                        <div class="card-body text-white">
                                            2
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Keterangan -->
                    <hr>
                    <div class="card-header pt-0">
                        <p class="text-small text-primary px-0 py-0 my-0">Absensi pada <?= strtolower(date("l, j F Y")); ?></p>
                    </div>
                </div>
            </div>
            <!-- End of Absensi Harian -->
        </div>
    </section>

    <section class="section">
        <!-- Absensi Per Siswa Per Hari -------------------------------------------------------------->
        <div class="row">
            <div class="col">
                <div class="card card-statistic-1">
                    <!-- JUDUL -->
                    <div class="row card-body pl-0 mr-4 ml-2">
                        <div class="col">
                            <div class="card-header px-0 mx-0">
                                <h5 class="text-primary">
                                    <i class="fas fa-clipboard-list text-primary" style="font-size: 25px;"></i>
                                    &nbsp;<?= $judul; ?>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- TABEL Absensi Per Siswa Per Hari -->
                    <div class="row mx-1">
                        <div class="col mt-3 mb-1">

                            <div class="row">
                                <div class="col card-statistic-1 mx-0 pb-3">
                                    <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                        <div class="col">
                                            <div class="nav-link px-0 px-0"><strong>NIS / NISN</strong></div>
                                        </div>
                                        <div class="col-lg-9 col-md-auto">
                                            <div class="py-2 align-middle">:<span>&nbsp;</span>
                                                <?= (session()->data->username) ? @ucwords(session()->data->username) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-0 mx-0" style="background-color: #fff;">
                                        <div class="col">
                                            <div class="nav-link px-0"><strong>Nama Lengkap</strong></div>
                                        </div>
                                        <div class="col-lg-9 col-md-auto">
                                            <div class="py-2 align-middle">:<span>&nbsp;</span>
                                                <?= (session()->data->fullname) ? @ucwords(session()->data->fullname) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                        <div class="col">
                                            <div class="nav-link px-0"><strong>ًWali Kelas</strong></div>
                                        </div>
                                        <div class="col-lg-9 col-md-auto">
                                            <div class="py-2 align-middle">:<span>&nbsp;</span>
                                                <?= (@session()->data->waliKelas) ? @ucwords(session()->data->waliKelas) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-0 mx-0" style="background-color: #fff;">
                                        <div class="col">
                                            <div class="nav-link px-0"><strong>No Telp</strong></div>
                                        </div>
                                        <div class="col-lg-9 col-md-auto">
                                            <div class="py-2 align-middle">:<span>&nbsp;</span>
                                                <?= (session()->data->nomorHp) ? @ucwords(session()->data->nomorHp) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="col my-3 mx-0 px-0">
                                <div class="">
                                    <table class="table table-striped table-bordered table-sm">
                                        <!-- Table Header -->
                                        <tr class="">
                                            <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">No</th>
                                            <th rowspan="2" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Hari / Tanggal</th>
                                            <th colspan="4" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Absen</th>
                                        </tr>
                                        <tr class="">
                                            <th scope="row" class="col-1 text-center text-white bg-danger" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">A</th>
                                            <th scope="row" class="col-1 text-center text-white bg-warning" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">S</th>
                                            <th scope="row" class="col-1 text-center text-white bg-info" style="border: 1px solid rgba(0, 0, 0, 0.1) ;">I</th>
                                            <th scope="row" class="col-1 text-center text-white bg-success" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><i class="fas fa-check"></i></th>
                                        </tr>
                                        <!-- End of Table Header -->
                                        <?php $no = 1;
                                        foreach ($dataAbsensi as $dataAbsen) : ?>
                                            <tr>
                                                <th scope="row" class="text-center">1</th>
                                                <td class="pl-3 align-middle">
                                                    <?php
                                                    // Hari, tanggal dan bulan di terjemahkan manual di controller
                                                    $namahari = @date('l', @strtotime($dataAbsen->tanggal));
                                                    // tahun[0] bulan[1] tanggal[2] dipecah(explode) 
                                                    $split = @explode('-', @$dataAbsen->tanggal);
                                                    // lalu disusun ulang menjandi tanggal[2] bulan[1] tahun[0]
                                                    echo @$hari[$namahari] . ", " . @$split[2] . ' ' . @$bulan[(int)$split[1]] . ' ' . @$split[0];
                                                    ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?= (@$dataAbsen->absen == 'alpa') ? '<div class="badge badge-danger py-1">Alpa</div>' : "" ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?= (@$dataAbsen->absen == 'sakit') ? '<div class="badge badge-warning py-1">Sakit</div>' : "" ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?= (@$dataAbsen->absen == 'izin') ? '<div class="badge badge-info py-1">Izin</div>' : "" ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?= (@$dataAbsen->absen == 'masuk') ? '<div class="badge badge-success py-1">Masuk</div>' : "" ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <!-- Jumlah -->
                                        <tr>
                                            <th scope="row" colspan="2" class="align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)">Jumlah</th>
                                            <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)">1</td>
                                            <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)">2</td>
                                            <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)">1</td>
                                            <td class="text-center align-middle" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)">0</td>
                                        </tr>
                                    </table>

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
            <!-- End Of Absensi Kelas -->
        </div>
    </section>
<?php endif; ?>

<?php if (session()->levelId == 2 || session()->levelId == 1) : ?>
    <section class="section">
        <!-- Input Absen Harian Untuk Guru -->
        <div class="row">
            <div class="col">
                <div class="card card-statistic-1">
                    <!-- JUDUL -->
                    <div class="row card-body pl-0 mr-4 ml-2 mb-3">
                        <div class="col">
                            <div class="card-header px-0 mx-0">
                                <h5 class="text-primary">
                                    <i class="fas fa-clipboard-list text-primary" style="font-size: 25px;"></i>
                                    &nbsp;Input Absen
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Alert -->
                    <div class="mx-4">
                        <?php if (!empty(session()->getFlashdata('update'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                    <span>×</span>
                                </button>
                                <div class="text-left">
                                    <?= session()->getFlashdata('update'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- TABEL SPP -->
                    <div class="row mx-1">
                        <div class="col mb-1">

                            <!-- Select Option -->
                            <div class="row">
                                <div class="form-group my-0 pr-1 col-6">
                                    <select class="custom-select rounded-pill">
                                        <option>Kelas</option>
                                        <option value="vii">Kelas VII</option>
                                        <option value="viii">Kelas VIII</option>
                                        <option value="ix">Kelas IX</option>
                                    </select>
                                </div>
                                <div class="form-group my-0 pl-1 col-6">
                                    <select class="custom-select rounded-pill">
                                        <option>Bagian</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>

                            <form method="post" action="<?= base_url(); ?>/absensi/edit">
                                <?php $validationAbsen = \Config\Services::validation(); ?>
                                <!-- Tanggal -->
                                <div class="form-group mb-3 mt-3">
                                    <input name="tanggal" type="date" value="<?= old('tanggal') ?>" class="form-control rounded-pill <?= $validationAbsen->hasError('tanggal') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationAbsen->getError('tanggal') ?>
                                    </div>
                                </div>

                                <hr class="mt-0">
                                <div class="text-danger text-small">* Note : Jika tidak di <strong>pilih</strong> maka nilai defaultnya <strong>masuk</strong></div>
                                <div class="col my-3 mx-0 px-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-sm">
                                            <!-- Table Header -->
                                            <tr class="" style="border-top: solid 2px #6777ef;">
                                                <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">No</th>
                                                <th rowspan="2" class="col-4 align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Nama Lengkap</th>
                                                <th colspan="4" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Absen</th>
                                            </tr>
                                            <tr class="">
                                                <th scope="row" class="col-1 text-center text-danger" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>A</strong></th>
                                                <th scope="row" class="col-1 text-center text-warning" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>S</strong></th>
                                                <th scope="row" class="col-1 text-center text-info" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>I</strong></th>
                                                <th scope="row" class="col-1 text-center text-success" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><i class="fas fa-check"></i></th>
                                            </tr>
                                            <!-- End of Table Header -->

                                            <!-- radio box -->
                                            <?php $no = 1;
                                            $nameA = 1;
                                            $nameS = 1;
                                            $nameI = 1;
                                            $nameM = 1;
                                            $forA = 1;
                                            $forS = 100;
                                            $forI = 200;
                                            $forM = 300;
                                            $idA = 1;
                                            $idS = 100;
                                            $idI = 200;
                                            $idM = 300;

                                            foreach ($dataAbsensi as $dataAbsen) : ?>
                                                <?php foreach ($dataStudents as $dataStudent) : ?>
                                                    <tr>
                                                        <th scope="row" class="text-center"><?= $no++; ?></th>
                                                        <td class="align-middle"><?= @ucwords($dataStudent->fullname); ?></td>

                                                        <td class="pl-2 pr-0 text-center align-middle bg-danger">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="<?= $idA++; ?>" value="alpa" name="<?= 'absen' . $nameA++; ?>" class="custom-control-input">
                                                                <label class="custom-control-label" for="<?= $forA++; ?>">
                                                                    <!--<span class="badge badge-danger mb-1 px-1 mr-2"> </span>-->
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="pl-2 pr-0 text-center align-middle bg-warning">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="<?= $idS++; ?>" value="sakit" name="<?= 'absen' . $nameS++; ?>" class="custom-control-input">
                                                                <label class="custom-control-label" for="<?= $forS++; ?>">
                                                                    <!-- <span class="badge badge-warning mb-1 px-1 mr-2"> </span> -->
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="pl-2 pr-0 text-center align-middle bg-info">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="<?= $idI++; ?>" value="izin" name="<?= 'absen' . $nameI++; ?>" class="custom-control-input">
                                                                <label class="custom-control-label" for="<?= $forI++; ?>">
                                                                    <!-- <span class="badge badge-info mb-1 px-1 mr-2"> </span> -->
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="pl-2 pr-0 text-center align-middle bg-success">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="<?= $idM++; ?>" value="masuk" name="<?= 'absen' . $nameM++; ?>" class="custom-control-input" checked>
                                                                <label class="custom-control-label" for="<?= $forM++; ?>">
                                                                    <!-- <span class="badge badge-success mb-1 px-1 mr-2"> </span> -->
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>

                                            <!-- radio Box -->
                                        </table>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-6 col-md-auto">
                                            <button type="submit" class="btn px-4 btn-sm btn-primary btn-block rounded-pill">Simpan</button>
                                        </div>
                                    </div>
                            </form>

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
        <!-- End Of Absensi Kelas -->
    </section>
<?php endif; ?>
<?= $this->endSection(); ?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
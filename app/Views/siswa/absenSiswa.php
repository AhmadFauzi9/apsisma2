<?= $this->extend('templates/index'); ?>

<!-- ABSENSI SISWA ------------------------------------------------------------------------ -->

<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h4 class="mb-1">Absensi</h4>
        <div class="section-header-breadcrumb">
            <ol class="breadcrumb bg-transparent px-0 my-0 py-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/menu/"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/HasilAbsen/<?= session()->data->username ?>"><i class="fas fa-list"></i> Absensi</a></li>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('absen-siswa'); ?>
<!-- Persentase perbulan-->
<section class="section">
    <div class="row mx-0 px-0">
        <div class="col px-0 mx-0">
            <h2 class="section-title mt-0 pt-2">Absensi Harian</h2>
            <p class="section-lead">Absensi tiap hari semua kelas</p>
        </div>
        <div class="col px-0 mx-0">
            <!-- Pilih Bulan -->
            <form action="<?= base_url() ?>/absensi/pilih_bulan/" method="post">
                <!-- Untuk mengambil username yang sedang login dan digunakan untuk memilih data absen yang akan ditampilkan -->
                <input type="hidden" name="username" value="<?= session()->data->username ?>">
                <div class="input-group mb-3 pt-1">
                    <select name="pilih_bulan" class="custom-select" data-width="250" style="border-radius: 20px 0 0 20px;">
                        <?php $split = @explode("-", $dataAbsensi[0]->tanggal); ?>
                        <option selected disabled>Pilih Bulan</option>
                        <option <?= (@$split[1] == "01") ? "selected" : null ?> value="01">Januari</option>
                        <option <?= (@$split[1] == "02") ? "selected" : null ?> value="02">Februari</option>
                        <option <?= (@$split[1] == "03") ? "selected" : null ?> value="03">Maret</option>
                        <option <?= (@$split[1] == "04") ? "selected" : null ?> value="04">April</option>
                        <option <?= (@$split[1] == "05") ? "selected" : null ?> value="05">Mei</option>
                        <option <?= (@$split[1] == "06") ? "selected" : null ?> value="06">Juni</option>
                        <option <?= (@$split[1] == "07") ? "selected" : null ?> value="07">Juli</option>
                        <option <?= (@$split[1] == "08") ? "selected" : null ?> value="08">Agustus</option>
                        <option <?= (@$split[1] == "09") ? "selected" : null ?> value="09">September</option>
                        <option <?= (@$split[1] == "10") ? "selected" : null ?> value="10">Oktober</option>
                        <option <?= (@$split[1] == "11") ? "selected" : null ?> value="11">November</option>
                        <option <?= (@$split[1] == "12") ? "selected" : null ?> value="12">Desember</option>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary btn-block py-2" style="border-radius: 0 20px 20px 0;">Pilih</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                        <div class="col pt-2 mx-0 my-0">
                            <div class="card my-2 bg-success card-statistic-1 ">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-check-circle fa-2x text-success"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Masuk</h4>
                                    </div>
                                    <div class="card-body text-white"><?= round($persen_masuk, 1) . "%" ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Alpa -->
                        <div class="col pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-danger card-statistic-1">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-times-circle fa-2x text-danger" aria-hidden="true"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Alpa</h4>
                                    </div>
                                    <div class="card-body text-white"><?= round($persen_alpa, 1) . "%" ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Sakit -->
                        <div class="col pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-warning card-statistic-1">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-frown fa-2x text-warning" aria-hidden="true"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Sakit</h4>
                                    </div>
                                    <div class="card-body text-white"><?= round($persen_sakit, 1) . "%" ?> </div>
                                </div>
                            </div>
                        </div>
                        <!-- Izin -->
                        <div class="col pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-info card-statistic-1">
                                <div class="card-icon bg-white">
                                    <i class="fa fa-info fa-2x text-info" aria-hidden="true"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Izin</h4>
                                    </div>
                                    <div class="card-body text-white"><?= round($persen_izin, 1) . "%" ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Telat -->
                        <div class="col pb-0 pt-2 mx-0 my-0">
                            <div class="card my-2 bg-secondary card-statistic-1">
                                <div class="card-icon bg-white">
                                    <i class="fab fa-tumblr fa-2x text-secondary" style="font-size: 25px;"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-white">Terlambat</h4>
                                    </div>
                                    <div class="card-body text-white"><?= round($persen_izin, 1) . "%" ?></div>
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

                                <div class="row px-0 mx-0" style="background-color: #fff;">
                                    <div class="col">
                                        <div class="nav-link px-0"><strong>Kelas</strong></div>
                                    </div>
                                    <div class="col-lg-9 col-md-auto">
                                        <div class="py-2 align-middle">:<span>&nbsp;</span>
                                            <?= (session()->data->kelas) ? @strtoupper(session()->data->kelas . "-" . session()->data->bagian) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                    <div class="col">
                                        <div class="nav-link px-0"><strong>ًWali Kelas</strong></div>
                                    </div>
                                    <div class="col-lg-9 col-md-auto">
                                        <div class="py-2 align-middle">:<span>&nbsp;</span>
                                            <?php foreach ($wali_kelas as $wali) : ?>
                                                <?= $wali->kelas == strtoupper(session()->data->kelas) ? $wali->wali_kelas : '<span class="text-danger text-small">Kosong</span>'; ?>
                                                <?php if ($wali->kelas != session()->data->kelas) break ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-0 mx-0" style="background-color: #fff;">
                                    <div class="col">
                                        <div class="nav-link px-0"><strong>No Telp</strong></div>
                                    </div>
                                    <div class="col-lg-9 col-md-auto">
                                        <div class="py-2 align-middle">:<span>&nbsp;</span>
                                            <?php foreach ($wali_kelas as $wali) : ?>
                                                <?= $wali->kelas == strtoupper(session()->data->kelas) ? $wali->nomorHp : '<span class="text-danger text-small">Kosong</span>'; ?>
                                                <?php if ($wali->kelas != session()->data->kelas) break ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="col my-3 mx-0 px-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-md">
                                    <!-- Table Header -->
                                    <tr class="">
                                        <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">No</th>
                                        <th rowspan="2" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Hari / Tanggal</th>
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
                                            <td class="pl-3 align-middle">
                                                <?php
                                                // Merubah Hari inggris jadi indonesia, tanggal dan bulan di terjemahkan manual di controller
                                                $namahari = @date("l", @strtotime($dataAbsen->tanggal));
                                                // tahun[0] bulan[1] tanggal[2] dipecah(explode) 
                                                $split = @explode("-", @$dataAbsen->tanggal);
                                                // lalu disusun ulang menjandi tanggal[2] bulan[1] tahun[0]
                                                echo @$nama_hari[$namahari] . ", " . @$split[2] . " " . @$nama_bulan[(int)$split[1]] . " " . @$split[0];
                                                ?>
                                            </td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'alpa') ? '<div class="badge badge-danger py-1">Alpa</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'sakit') ? '<div class="badge badge-warning py-1">Sakit</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'izin') ? '<div class="badge badge-info py-1">Izin</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'telat') ? '<div class="badge badge-secondary py-1">Terlambat</div>' : "" ?></td>
                                            <td class="text-center align-middle"><?= (@$dataAbsen->absen == 'masuk') ? '<div class="badge badge-success py-1">Masuk</div>' : "" ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- Jumlah -->
                                    <tr>
                                        <th scope="row" colspan="2" class="align-middle text-right pr-2 text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1); border-top: 2px solid rgba(0, 0, 0, 0.1)">TOTAL</th>
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
<?= $this->endSection(); ?>
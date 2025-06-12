<?= $this->extend('templates/index'); ?>

<!-- ABSENSI SISWA ------------------------------------------------------------------------ -->

<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h4 class="mb-1">Absensi</h4>
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

<?= $this->section('rekapAbsen_Bulanan'); ?>
<!-- Absensi Per Siswa Per Hari -------------------------------------------------------------->
<section class="section">
    <div class="row mx-0 px-0">
        <div class="col px-0 mx-0">
            <h2 class="section-title mt-0 pt-2">Rekap Bulanan</h2>
            <p class="section-lead">Rekap absensi siswa setiap bulan</p>
        </div>
        <div class="col px-0 mx-0">
            <!-- Pilih Bulan -->
            <form action="<?= base_url() ?>/absensi/pilih_bulan_rekapan/" method="post">
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
                        <button type="submit" class="btn btn-primary btn-block px-3" style="border-radius: 0 20px 20px 0;">Pilih</button>
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
                            <h5 class=">
                                <i class=" fas fa-clipboard-list" style="font-size: 20px;"></i>
                                &nbsp;Rekap Absen
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- TABEL Absensi Per Siswa Per Hari -->
                <div class="row mx-1">
                    <div class="col mb-1">

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
                            </div>
                        </div>

                        <div class="col mb-3 mx-0 px-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-md">
                                    <!-- KELAS 7 --------------------------------------------------------------------------------------------->
                                    <tr>
                                        <th colspan="16">BULAN : </th>
                                    </tr>
                                    <!-- Table Header --------------------------------------------------------------------------------------------->
                                    <tr class="" style="border-top: 2px solid #6777ef">
                                        <th rowspan="2" class="col-1 text-center align-middle td-border">No</th>
                                        <th rowspan="2" class="col-1 text-center align-middle td-border">Kelas</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jml Siswa</th>
                                        <th colspan="4" class="col-4 text-center align-middle td-border">Absen</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jumlah S+I+A</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Persentase S+I+A</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jumlah Hadir</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Persentase Hadir</th>
                                    </tr>
                                    <tr class="">
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center text-white bg-warning td-border">S</th>
                                        <th class="col-1 text-center text-white bg-info td-border">I</th>
                                        <th class="col-1 text-center text-white bg-danger td-border">A</th>
                                        <th class="col-1 text-center text-white bg-secondary td-border">T</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                    </tr>
                                    <!-- End of Table Header -->

                                    <!-- Table Body --------------------------------------------------------------------------------------------->
                                    <?php $no = 1;
                                    $jml_lp_7 = 0;
                                    $jml_l_7  = 0;
                                    $jml_p_7  = 0;
                                    foreach ($dataRekap_7 as $rekap) : ?>
                                        <?php $jml_lp_7 += $rekap->jml_siswa; ?>
                                        <?php $rekap->gender == "laki-laki" ? $jml_l_7 += $rekap->jml_siswa : '' ?>
                                        <?php $rekap->gender == "perempuan" ? $jml_p_7 += $rekap->jml_siswa : '' ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $no++ ?></th>
                                            <td class="align-middle text-center"><?= $rekap->kelas_bagian ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 200, 245, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_siswa : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 200, 245, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_siswa : '' ?></td>
                                            <td class="align-middle text-center"><span class="badge badge-warning"><?= $rekap->sakit != 0 ? $rekap->sakit : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-info"><?= $rekap->izin != 0 ? $rekap->izin : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-danger"><?= $rekap->alpa != 0 ? $rekap->alpa : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-secondary"><?= $rekap->telat != 0 ? $rekap->telat : '' ?></span></td>
                                            <td class="align-middle text-center" style="background-color: rgba(245, 204, 39, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_sia : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(245, 204, 39, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_sia : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'laki-laki' ? $rekap->persen_sia . "%" : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'perempuan' ? $rekap->persen_sia . "%" : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 245, 106, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_hadir : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 245, 106, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_hadir : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'laki-laki' ? $rekap->persen_hadir . "%" : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'perempuan' ? $rekap->persen_hadir . "%" : '' ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <!-- End of Table Body -->

                                    <!-- Table Footer --------------------------------------------------------------------------------------------->
                                    <tr class="td-border-bot td-border-top">
                                        <td class="text-center align-middle td-border td-border-top">Jumlah</td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_lp_7 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_l_7 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_p_7 ?></td>
                                        <td colspan="12" class="text-center align-middle"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="16"></td>
                                    </tr>
                                    <!-- End of Table Footer -->


                                    <!-- KELAS 8 --------------------------------------------------------------------------------------------->
                                    <tr class="" style="border-top: 2px solid #6777ef">
                                        <th rowspan="2" class="col-1 text-center align-middle td-border">No</th>
                                        <th rowspan="2" class="col-1 text-center align-middle td-border">Kelas</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jml Siswa</th>
                                        <th colspan="4" class="col-4 text-center align-middle td-border">Absen</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jumlah S+I+A</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Persentase S+I+A</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jumlah Hadir</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Persentase Hadir</th>
                                    </tr>
                                    <tr class="">
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center text-white bg-warning td-border">S</th>
                                        <th class="col-1 text-center text-white bg-info td-border">I</th>
                                        <th class="col-1 text-center text-white bg-danger td-border">A</th>
                                        <th class="col-1 text-center text-white bg-secondary td-border">T</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                    </tr>
                                    <!-- End of Table Header -->

                                    <!-- Table Body --------------------------------------------------------------------------------------------->
                                    <?php $no = 1;
                                    $jml_lp_8 = 0;
                                    $jml_l_8  = 0;
                                    $jml_p_8  = 0;
                                    foreach ($dataRekap_8 as $rekap) : ?>
                                        <?php $jml_lp_8 += $rekap->jml_siswa; ?>
                                        <?php $rekap->gender == "laki-laki" ? $jml_l_8 += $rekap->jml_siswa : '' ?>
                                        <?php $rekap->gender == "perempuan" ? $jml_p_8 += $rekap->jml_siswa : '' ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $no++ ?></th>
                                            <td class="align-middle text-center"><?= $rekap->kelas_bagian ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 200, 245, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_siswa : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 200, 245, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_siswa : '' ?></td>
                                            <td class="align-middle text-center"><span class="badge badge-warning"><?= $rekap->sakit != 0 ? $rekap->sakit : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-info"><?= $rekap->izin != 0 ? $rekap->izin : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-danger"><?= $rekap->alpa != 0 ? $rekap->alpa : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-secondary"><?= $rekap->telat != 0 ? $rekap->telat : '' ?></span></td>
                                            <td class="align-middle text-center" style="background-color: rgba(245, 204, 39, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_sia : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(245, 204, 39, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_sia : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'laki-laki' ? $rekap->persen_sia . "%" : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'perempuan' ? $rekap->persen_sia . "%" : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 245, 106, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_hadir : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 245, 106, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_hadir : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'laki-laki' ? $rekap->persen_hadir . "%" : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'perempuan' ? $rekap->persen_hadir . "%" : '' ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <!-- End of Table Body -->

                                    <!-- Table Footer --------------------------------------------------------------------------------------------->
                                    <tr class="td-border-bot td-border-top">
                                        <td class="text-center align-middle td-border td-border-top">Jumlah</td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_lp_8 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_l_8 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_p_8 ?></td>
                                        <td colspan="12" class="text-center align-middle"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="16"></td>
                                    </tr>
                                    <!-- End of Table Footer -->


                                    <!-- KELAS 9 --------------------------------------------------------------------------------------------->
                                    <tr class="" style="border-top: 2px solid #6777ef">
                                        <th rowspan="2" class="col-1 text-center align-middle td-border">No</th>
                                        <th rowspan="2" class="col-1 text-center align-middle td-border">Kelas</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jml Siswa</th>
                                        <th colspan="4" class="col-4 text-center align-middle td-border">Absen</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jumlah S+I+A</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Persentase S+I+A</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Jumlah Hadir</th>
                                        <th colspan="2" class="col-1 text-center align-middle td-border">Persentase Hadir</th>
                                    </tr>
                                    <tr class="">
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center text-white bg-warning td-border">S</th>
                                        <th class="col-1 text-center text-white bg-info td-border">I</th>
                                        <th class="col-1 text-center text-white bg-danger td-border">A</th>
                                        <th class="col-1 text-center text-white bg-secondary td-border">T</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                        <th class="col-1 text-center td-border">L</th>
                                        <th class="col-1 text-center td-border">P</th>
                                    </tr>
                                    <!-- End of Table Header -->

                                    <!-- Table Body --------------------------------------------------------------------------------------------->
                                    <?php $no = 1;
                                    $jml_lp_9 = 0;
                                    $jml_l_9  = 0;
                                    $jml_p_9  = 0;
                                    foreach ($dataRekap_9 as $rekap) : ?>
                                        <?php $jml_lp_9 += $rekap->jml_siswa; ?>
                                        <?php $rekap->gender == "laki-laki" ? $jml_l_9 += $rekap->jml_siswa : '' ?>
                                        <?php $rekap->gender == "perempuan" ? $jml_p_9 += $rekap->jml_siswa : '' ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $no++ ?></th>
                                            <td class="align-middle text-center"><?= $rekap->kelas_bagian ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 200, 245, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_siswa : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 200, 245, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_siswa : '' ?></td>
                                            <td class="align-middle text-center"><span class="badge badge-warning"><?= $rekap->sakit != 0 ? $rekap->sakit : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-info"><?= $rekap->izin != 0 ? $rekap->izin : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-danger"><?= $rekap->alpa != 0 ? $rekap->alpa : '' ?></span></td>
                                            <td class="align-middle text-center"><span class="badge badge-secondary"><?= $rekap->telat != 0 ? $rekap->telat : '' ?></span></td>
                                            <td class="align-middle text-center" style="background-color: rgba(245, 204, 39, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_sia : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(245, 204, 39, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_sia : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'laki-laki' ? $rekap->persen_sia . "%" : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'perempuan' ? $rekap->persen_sia . "%" : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 245, 106, 0.1);"><?= $rekap->gender == 'laki-laki' ? $rekap->jml_hadir : '' ?></td>
                                            <td class="align-middle text-center" style="background-color: rgba(39, 245, 106, 0.1);"><?= $rekap->gender == 'perempuan' ? $rekap->jml_hadir : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'laki-laki' ? $rekap->persen_hadir . "%" : '' ?></td>
                                            <td class="align-middle text-center"><?= $rekap->gender == 'perempuan' ? $rekap->persen_hadir . "%" : '' ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <!-- End of Table Body -->

                                    <!-- Table Footer --------------------------------------------------------------------------------------------->
                                    <tr class="td-border-bot td-border-top">
                                        <td class="text-center align-middle td-border td-border-top">Jumlah</td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_lp_9 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_l_9 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_p_9 ?></td>
                                        <td colspan="12" class="text-center align-middle"></td>
                                    </tr>
                                    <!-- End of Table Footer -->

                                    <!-- SUB TOTAL DAN TOTAL -->
                                    <!-- Table Footer --------------------------------------------------------------------------------------------->
                                    <tr class="td-border-bot td-border-top">
                                        <td colspan="2" class="text-center align-middle td-border td-border-top">SUB TOTAL</td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_l_7 + $jml_l_8 + $jml_l_9 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= $jml_p_7 + $jml_p_8 + $jml_p_9 ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_sakit_cowok[0]->sakit ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_izin_cowok[0]->izin ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_alpa_cowok[0]->alpa ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_telat_cowok[0]->telat ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_sia_cowok[0]->jml_sia ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_sia_cewek[0]->jml_sia ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$jml_persen_sia_cowok == null) ? 0 . "%" : $jml_persen_sia_cowok . "%" ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$jml_persen_sia_cewek == null) ? 0 . "%" : $jml_persen_sia_cewek . "%" ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_hadir_cowok[0]->jml_hadir ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= @$jml_hadir_cewek[0]->jml_hadir ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$jml_persen_hadir_cowok == null) ? 0 . "%" : @$jml_persen_hadir_cowok . "%" ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$jml_persen_hadir_cewek == null) ? 0 . "%" : @$jml_persen_hadir_cewek . "%" ?></td>
                                    </tr>
                                    <tr class="td-border-bot td-border-top">
                                        <td colspan="2" class="text-center align-middle td-border td-border-top">TOTAL</td>
                                        <td colspan="2" class="text-center align-middle td-border td-border-top"><?= @$total_siswa[0]->jml_siswa ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$total_persen_sakit == 0) ? 0 . "%" : ($total_persen_sakit . "%") ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$total_persen_izin == 0) ? 0 . "%" : ($total_persen_izin . "%") ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$total_persen_alpa == 0) ? 0 . "%" : ($total_persen_alpa . "%") ?></td>
                                        <td class="text-center align-middle td-border td-border-top"><?= (@$total_persen_telat == 0) ? 0 . "%" : ($total_persen_telat . "%") ?></td>
                                        <td colspan="2" class="text-center align-middle td-border td-border-top"><?= @$total_sia[0]->jml_sia ?></td>
                                        <td colspan="2" class="text-center align-middle td-border td-border-top"><?= @$total_persen_sia . "%" ?></td>
                                        <td colspan="2" class="text-center align-middle td-border td-border-top"><?= @$total_hadir ?></td>
                                        <td colspan="2" class="text-center align-middle td-border td-border-top"><?= @$total_persen_hadir . "%" ?></td>
                                    </tr>
                                    <!-- End of Table Footer -->
                                </table>
                            </div>
                            <div class="card-footer my-0 py-0">
                                <!-- Pager -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODAL -->

<?= $this->endSection(); ?>
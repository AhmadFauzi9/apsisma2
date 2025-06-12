<?= $this->extend('templates/index'); ?>

<!-- ABSENSI SISWA ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h4 class="mb-1">Absensi</h4>
        <div class="section-header-breadcrumb">
            <ol class="breadcrumb bg-transparent my-0 py-0 px-0 mx-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/pilih_insertAbsen/">Input</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/rekapAbsen_Harian/">Absen Harian</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/absensi/rekapAbsen_Bulanan/">Rekap Bulanan</a></li>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<!-- Input Absen -->
<?= $this->section('input-absen'); ?>
<section class="section">
    <div class="row mx-0 px-0">
        <div class="col px-0 mx-0">
            <h2 class="section-title mt-0 pt-2">Input Absen</h2>
            <p class="section-lead"><i class="fas fa-exclamation-circle" style="font-size: 15px;">&nbsp;</i>&nbsp;Jika alpa, sakit, izin, atau terlambat tidak dipilih maka poin defaultnya hadir</p>
        </div>
    </div>

    <!-- Input Absen Harian Untuk Guru -->
    <div class="row">
        <div class="col">
            <div id="inputAbsen" class="card card-statistic-1">
                <!-- JUDUL -->
                <div class="row card-body pl-0 mr-4 ml-2 mb-3">
                    <div class="col">
                        <div class="card-header px-0 mx-0">
                            <h5 class="text-primary">
                                <i class="fas fa-clipboard-list text-primary" style="font-size: 20px;"></i>
                                &nbsp;Input Absen Harian
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Alert -->
                <div class="mx-3">
                    <?php if (!empty(session()->getFlashdata('update'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button class="close" data-dismiss="alert" style="margin-top: -2px;"><span>×</span></button>
                            <div class="text-left">
                                <?= session()->update; ?>
                                <?= session()->pilih_kelas; ?>
                            </div>
                        </div>
                    <?php elseif (!empty(session()->getFlashdata('pilih_kelas'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button class="close" data-dismiss="alert" style="margin-top: -2px;"><span>×</span></button>
                            <div class="text-left">
                                <?= session()->pilih_kelas; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- TABEL SPP -->
                <div class="row mx-1">
                    <div class="col mb-1">

                        <!-- Select Option -->
                        <form action="<?= base_url() ?>/absensi/pilih_kelas_tanggal/<?= @$option_kelas . @$option_bagian ?>" method="post">
                            <?php $validationAbsen = \Config\Services::validation(); ?>
                            <?php csrf_field() ?>
                            <div class="row px-0 mx-0">
                                <!-- Select Kelas -->
                                <div class="col px-0 mx-0">
                                    <div class="input-group mb-2">
                                        <select name="pilih_kelas" value="<?= old('pilih_kelas') ?>" class="custom-select <?= $validationAbsen->hasError('pilih_kelas') ? 'is-invalid' : null ?>" style="border-radius: 0">
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
                                    <div class="input-group mb-3">
                                        <select name="pilih_bagian" value="<?= old('pilih_bagian') ?>" class="custom-select <?= $validationAbsen->hasError('pilih_bagian') ? 'is-invalid' : null ?>" style="border-radius: 0">
                                            <option selected disabled>Bagian</option>
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
                                        <?php $tgl = date('d/m/Y') ?>
                                        <input name="tanggal" type="date" value="<?= old('tanggal') ?>" class="form-control <?= $validationAbsen->hasError('tanggal') ? 'is-invalid' : null ?>" style="border-radius: 0">
                                        <!-- Button -->
                                        <div class="input-group-append px-0 mx-0">
                                            <button type="submit" class="btn btn-primary btn-block">&nbsp;Pilih&nbsp;</button>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validationAbsen->getError('tanggal') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form method="post" action="<?= base_url(); ?>/Absensi/insert/">
                            <?php $validationAbsen = \Config\Services::validation(); ?>
                            <?php csrf_field() ?>

                            <!-- <i class="fas fa-exclamation-triangle"></i> -->
                            <!-- <div class="alert alert-info py-2 mb-2"><i class="fas fa-exclamation-circle" style="font-size: 15px;">&nbsp;</i>&nbsp;Jika A, S, I, atau T tidak dipilih maka nilai defaultnya hadir</div> -->
                            <div class="col mx-0 px-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm">
                                        <!-- Table Header -->
                                        <tr>
                                            <th colspan="7" class="pt-2 bg-white" style="border: 0;">
                                                KELAS : <?= @(strtoupper($dataStudents[0]->kelas) . " " . strtoupper($dataStudents[0]->bagian)) ?>
                                                &nbsp; | &nbsp;
                                                <?php
                                                @$split = @explode("-", $tanggal);
                                                echo "TANGGAL : " . @strtoupper(@$split[2] . " " . @$nama_bulan[(int)$split[1]] . " " . @$split[0]);
                                                ?>
                                            </th>
                                        </tr>
                                        <tr class="" style="border-top: solid 2px #6777ef;">
                                            <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">No</th>
                                            <th rowspan="2" class="col-4 align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Nama Lengkap</th>
                                            <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Kelas</th>
                                            <th colspan="4" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Absen</th>
                                        </tr>
                                        <tr class="">
                                            <th scope="row" class="col-1 text-center text-danger" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>A</strong></th>
                                            <th scope="row" class="col-1 text-center text-warning" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>S</strong></th>
                                            <th scope="row" class="col-1 text-center text-info" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>I</strong></th>
                                            <th scope="row" class="col-1 text-center text-dark" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>T</strong></th>
                                            <th scope="row" class="col-1 text-center text-success" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><i class="fas fa-check"></i></th>
                                        </tr>
                                        <!-- End of Table Header -->

                                        <!-- radio box -->
                                        <?php $no = 1;
                                        $no_user = 1;
                                        $no_name = 1;
                                        $no_kelas = 1;
                                        $no_bagian = 1;
                                        foreach ($dataStudents as $dataStudent) : ?>

                                            <input type="hidden" name="pilih_kelas" value="<?= $pilih_kelas ?>">
                                            <input type="hidden" name="pilih_bagian" value="<?= $pilih_bagian ?>">
                                            <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
                                            <input type="hidden" name="all_kelas" value="<?= $kabeh_kelas ?>">
                                            <input type="hidden" name="all_bagian" value="<?= $kabeh_bagian ?>">
                                            <input type="hidden" name="username<?= $username++ ?>" value="<?= $dataStudent->username ?>">
                                            <input type="hidden" name="fullname<?= $fullname++ ?>" value="<?= $dataStudent->fullname ?>">
                                            <input type="hidden" name="kelas<?= $nameKelas++ ?>" value="<?= $dataStudent->kelas ?>">
                                            <input type="hidden" name="bagian<?= $nameBagian++ ?>" value="<?= $dataStudent->bagian ?>">

                                            <tr>
                                                <th class="text-center"><?= $no++; ?></th>
                                                <td class="align-middle"><?= @ucwords($dataStudent->fullname); ?></td>
                                                <td class="align-middle text-center">
                                                    <?php
                                                    if ($dataStudent->kelas == "vii") : echo 7 . "-" . strtoupper($dataStudent->bagian);
                                                    elseif ($dataStudent->kelas == "viii") : echo 8 . "-" . strtoupper($dataStudent->bagian);
                                                    elseif ($dataStudent->kelas == "ix") : echo 9 . "-" . strtoupper($dataStudent->bagian);
                                                    endif; ?>
                                                </td>
                                                <td class="pl-2 pr-0 text-center align-middle bg-danger">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="<?= $idAlpa++; ?>" value="alpa" name="<?= 'absen' . $nameAlpa++; ?>" class="custom-control-input">
                                                        <label class="custom-control-label" for="<?= $forAlpa++; ?>"></label>
                                                    </div>
                                                </td>
                                                <td class="pl-2 pr-0 text-center align-middle bg-warning">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="<?= $idSakit++; ?>" value="sakit" name="<?= 'absen' . $nameSakit++; ?>" class="custom-control-input">
                                                        <label class="custom-control-label" for="<?= $forSakit++; ?>"></label>
                                                    </div>
                                                </td>
                                                <td class="pl-2 pr-0 text-center align-middle bg-info">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="<?= $idIzin++; ?>" value="izin" name="<?= 'absen' . $nameIzin++; ?>" class="custom-control-input">
                                                        <label class="custom-control-label" for="<?= $forIzin++; ?>"></label>
                                                    </div>
                                                </td>
                                                <td class="pl-2 pr-0 text-center align-middle bg-secondary">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="<?= $idTelat++; ?>" value="telat" name="<?= 'absen' . $nameTelat++; ?>" class="custom-control-input">
                                                        <label class="custom-control-label" for="<?= $forTelat++; ?>"></label>
                                                    </div>
                                                </td>
                                                <td class="pl-2 pr-0 text-center align-middle bg-success">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="<?= $idMasuk++; ?>" value="masuk" name="<?= 'absen' . $nameMasuk++; ?>" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="<?= $forMasuk++; ?>"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <!-- radio Box -->
                                    </table>
                                </div>
                                <div class="row justify-content-end mt-3">
                                    <div class="col-6 text-right">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save">&nbsp;</i> Simpan</button>
                                    </div>
                                </div>
                        </form>
                        <div class="card-footer pb-2">
                            <!-- Pager -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Absensi Kelas -->
</section>
<?= $this->endSection(); ?>

<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->extend('templates/index') ?>

<!-- User Siswa ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('userSiswa'); ?>
<?php if ((session()->levelId == 1) || (session()->levelId == 2)) : ?>
    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card card-statistic-1">
                    <!-- JUDUL -->
                    <div class="row card-body pl-0 mr-4 ml-2">
                        <div class="col">
                            <div class="card-header px-0 mx-0">
                                <h5 class="text-primary">
                                    <i class="fas fa-phone-square text-primary" style="font-size: 25px;"></i>
                                    &nbsp;<?= $judul ?>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- TABEL SPP -->
                    <div class="row mx-1">
                        <div class="col my-3">
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
                            <form action="<?= base_url() ?>/siswa/pilih_kelas/<?= @$option_kelas . " " . @$option_bagian ?>" method="post">
                                <div class="row mb-3">
                                    <div class="form-group my-0 col ml-2 px-1">
                                        <select name="pilih_kelas" class="custom-select rounded-pill">
                                            <option selected value="<?= $kabeh_kelas ?>" selected>Pilih Kelas</option>
                                            <option value="<?= $kabeh_kelas ?>">Semua Kelas</option>
                                            <?php
                                            foreach ($dataKelas as $kelas) :
                                                $select = "";

                                                if (isset($_GET['pilih_kelas'])) :

                                                    $option_kelas = $_GET['pilih_kelas'];

                                                    if ($option_kelas == ($kelas)) {
                                                        $select = "selected";
                                                    };

                                                endif; ?>
                                                <option <?= $select ?> value="<?= $kelas ?>">
                                                    Kelas
                                                    <?php if ($kelas == "VII") : echo 7;
                                                    elseif ($kelas == "VIII") : echo 8;
                                                    else : echo 9;
                                                    endif; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group my-0 col px-1">
                                        <select name="pilih_bagian" class="custom-select rounded-pill">
                                            <option selected value="<?= $kabeh_bagian ?>" selected>Pilih Bagian</option>
                                            <option value="<?= $kabeh_bagian ?>">Semua Bagian</option>
                                            <?php
                                            foreach ($dataBagian as $bagian) :
                                                $select = "";

                                                if (isset($_GET['pilih_bagian'])) :

                                                    $option_bagian = $_GET['pilih_bagian'];

                                                    if ($option_bagian == ($bagian)) {
                                                        $select = "selected";
                                                    };

                                                endif; ?>
                                                <option <?= $select ?> value="<?= $bagian ?>">Bagian <?= $bagian ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="mr-3 btn btn-primary rounded-pill">Pilih</button>
                                </div>
                                <!-- End of Select Kelas -->

                                <!-- Tabel User Siswa -->
                                <div class="table-responsive">
                                    <table id="tabelData" class="table table-striped table-bordered table-md">

                                        <thead>
                                            <tr>
                                                <th scope="row" class="col-1 text-center text-primary">No</th>
                                                <th scope="row" class="col-2 text-primary">Username/NIS</th>
                                                <th scope="row" class="col-4 text-primary">Nama Lengkap</th>
                                                <th scope="row" class="col-1 text-center text-primary">L/P</th>
                                                <th scope="row" class="col-1 text-center text-primary">Kelas</th>
                                                <th scope="row" class="col-1 text-center text-primary">Status</th>
                                                <th scope="row" class="col-2 text-center text-primary">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($dataStudents as $dataStudent) : ?>
                                                <tr>
                                                    <th scope="row" class="text-center"><?= $no++; ?></th>
                                                    <td class="align-middle"><?= ucwords($dataStudent->username) ?></td>
                                                    <td class="align-middle"><?= ucwords($dataStudent->fullname) ?></td>
                                                    <td class="align-middle text-center"> <?= ($dataStudent->gender == "laki-laki") ? "L" : "P" ?></td>
                                                    <td class="align-middle text-center"><?= @strtoupper($dataStudent->kelas) . "-" . strtoupper($dataStudent->bagian) ?></td>
                                                    <!-- Status -->
                                                    <td class="align-middle text-center">
                                                        <?php if ($dataStudent->status == true) : ?>
                                                            <span class="badge badge-success" title="aktif" style="box-shadow: none;"> </span>
                                                        <?php else : ?>
                                                            <span class="badge badge-danger" title="boyong" style="box-shadow: none;"> </span>
                                                        <?php endif ?>
                                                    </td>
                                                    <!-- Tombol Aksi -->
                                                    <td class="align-middle text-center">
                                                        <a href="<?= base_url() ?>/siswa/detail/<?= $dataStudent->username ?>" class="btn btn-sm btn-info pr-1 mr-2"><i class="far fa-eye text-white"></i>&nbsp;</a>
                                                        <a href="#" data-toggle="modal" data-target="#confirmDelete" class="btn btn-sm btn-danger pr-2" title="Delete"><i class="far fa-trash-alt text-white"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="col">
                                        Jumlah siswa = <span class="text-primary"><?= @$jumlahSiswa ?></span><br>
                                        Siswa aktif = <span class="text-success"><?= @$siswa_aktif ?></span><br>
                                        Siswa boyong = <span class="text-danger"><?= @$siswa_boyong ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="card-footer my-0 py-0">
                        <hr class="mt-2">
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
                    <!-- End of Tabel User Siswa -->
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Harus Login Dulu -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>

                <div class="modal-body mb-0">
                    <span>
                        Yakin mau menghapus user ini?
                    </span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-2">Nggak jadi</button>
                    <form action="<?= base_url() ?>/siswa/delete/<?= (@$dataStudent->username) ?>" method="POST" class="d-inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-primary">Yakin dong</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>
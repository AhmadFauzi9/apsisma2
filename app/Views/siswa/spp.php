<?= $this->extend('templates/index') ?>

<!-- SPP ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('spp'); ?>
<section class="section">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <!-- JUDUL -->
                <div class="col px-0">
                    <div class="card-header pb-2">
                        <h5 class="text-primary">
                            <i class="fas fa-user text-primary" style="font-size: 25px;"></i>
                            &nbsp;Biodata Siswa
                        </h5>
                    </div>
                </div>

                <!-- TABEL Biodata Siswa -->
                <div class="col my-3">
                    <div class="mx-1">
                        <table class="table table-striped table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th scope="row" class="col-5">NIS </th>
                                    <td class="col-8 col-md-auto">123456</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-5">Nama</th>
                                    <td class="col-8 col-md-auto">Ahmad Fauzi</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-5">Kelas</th>
                                    <td class="col-8 col-md-auto">VIII A</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-5">Wali Kelas</th>
                                    <td class="col-8 col-md-auto">Nur Hasyim</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-5">No Telp</th>
                                    <td class="col-8 col-md-auto">081249481093</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-5">Tahun Ajaran</th>
                                    <td class="col-8 col-md-auto">2021/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card">
                <!-- JUDUL -->
                <div class="col px-0">
                    <div class="card-header pb-2">
                        <h5 class="text-primary">
                            <i class="fas fa-money-bill text-primary" style="font-size: 25px;"></i>
                            &nbsp;Pembayaran
                        </h5>
                    </div>
                </div>

                <!-- TABEL SPP -->
                <div class="row mx-1">
                    <div class="col my-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th scope="row" class="col-1 text-primary">BULAN</th>
                                        <th scope="row" class="col text-primary">DIBAYAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Januari</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Februari</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Maret</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">April</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Mei</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Juni</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col my-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th scope="row" class="col-1 text-primary">BULAN</th>
                                        <th scope="row" class="col text-primary">DIBAYAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Juli</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Agustus</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">September</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-success">
                                                Rp. 550.000
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Oktober</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-danger">Belum</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">November</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-danger">Belum</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="col-1 pr-5">Desember</th>
                                        <td class="col align-middle">
                                            <span class="badge badge-danger">Belum</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
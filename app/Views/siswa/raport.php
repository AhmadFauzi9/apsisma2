<?= $this->extend('templates/index') ?>

<!-- RAPORT ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('raport'); ?>
<section class="section">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <!-- JUDUL -->
                <div class="col px-0">
                    <div class="card-header pb-2 pl-4">
                        <h4 class="text-primary">
                            <i class="fas fa-file-download text-primary" style="font-size: 25px;"></i>
                            &nbsp;Download Raport Siswa
                        </h4>
                    </div>
                </div>

                <!-- TABEL Biodata Siswa -->
                <div class="col mt-3 mb-0">
                    <div class="mx-1">
                        <footer class="blockquote-footer text-small text-danger title-lead pb-2 pt-0">
                            Download raport semester saat ini
                        </footer>
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
                <hr class="mt-0">
                <div class="card-footer pt-0 pb-4 mx-0 px-2">
                    <div class="col">
                        <a href="" class="btn btn-primary btn-sm" style="box-shadow: none;">
                            <i class="fas fa-download"></i>
                            Download Raport
                        </a>
                        <a href="" class="btn btn-success btn-sm" style="box-shadow: none;">
                            <i class="fas fa-download"></i>
                            Monthly Report
                        </a>
                    </div>
                </div>
                <!-- <div class="col text-center">
                    <div class="btn-group text-center" role="group" aria-label="Basic example">
                        <a href="" class="btn btn-success" style="border-radius: 25px 0px 0px 25px;">Download Raport</a>
                        <a href="" class="btn btn-warning" style="border-radius: 0px 25px 25px 0px;">Monthly Report</a>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- PEMBAYARAN -->
        <div class="col">
            <div class="card">
                <div class="col px-0">
                    <div class="card-header pb-2">
                        <h4 class="text-primary">
                            <i class="fa fa-archive text-primary" style="font-size: 25px;"></i>
                            &nbsp;Arsip Raport
                        </h4>
                    </div>
                </div>

                <div class="row mx-1">
                    <div class="col mt-3 mb-0">
                        <footer class="blockquote-footer text-small text-danger title-lead pb-2 pt-0">
                            Raport persemester dari kelas VII s/d kelas IX
                        </footer>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <!-- thead -->
                                <tr class="text-primary">
                                    <th rowspan="2" class="col-2 align-middle text-center">Kelas</th>
                                    <th colspan="2" class="align-middle text-center">Semester Ganjil</th>
                                    <th colspan="2" class="align-middle text-center">Semester Genap</th>
                                </tr>
                                <tr>
                                    <th class="col-2 text-small text-center">PTS</th>
                                    <th class="col-2 text-small text-center">PAS</th>
                                    <th class="col-2 text-small text-center">PTS</th>
                                    <th class="col-2 text-small text-center">PAT</th>
                                </tr>
                                <!-- end of thead -->
                                <!-- tbody -->
                                <tr>
                                    <th class="align-middle text-center">Kelas VII</th>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle text-center">Kelas VIII</th>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle text-center">Kelas IX</th>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-success btn-sm" title="Download" style="box-shadow: none;">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" title="Lihat" style="box-shadow: none;">
                                            <i class="far fa-eye fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- end of tbody -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection(); ?>
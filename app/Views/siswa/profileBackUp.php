<?= $this->extend('templates/index') ?>

<!-- BIODATA SISWA ---------------------------------------------------------------------------------------------------------- -->
<?= $this->section('profile-siswa'); ?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<!-- MODAL EDIT PROFILE ---------------------------------------------------------------------------------------------------------- -->
<?= $this->include('siswa/modals/editProfileModal') ?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<section class="section">
    <div class="row">
        <div class="col-lg-3 col-md-auto">
            <div class="card px-0">

                <div class="card-body px-0 py-0">
                    <!-- Background Warna -->
                    <div class="col pb-0 py-2 mx-0 my-0">
                        <div class="card my-2 mb-0 bg-primary card-statistic-1 ">
                            <img src="<?= base_url(); ?>/templates/assets/img/avatar/1.jpg" style="width: 100%;">
                        </div>
                    </div>
                    <!-- Keterangan -->
                    <div class="card-header justify-content-center pt-0 mt-0">
                        <a href="" class="text-primary px-0 py-0 my-0">Ganti Poto</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card card-statistic-1">
                <!-- JUDUL -->
                <div class="row card-body pl-0 mr-4 ml-2 mb-3">
                    <div class="col">
                        <div class="card-header px-0 mx-0">
                            <h5 class="text-primary">Biodata Diri</h5>
                        </div>
                    </div>
                    <div class="col-2 col-md-auto">
                        <div class="card-header text-right px-0 pt-3 mx-0">
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editProfile">Edit</a>
                        </div>
                    </div>
                </div>

                <!-- TABEL Biodata Siswa -->
                <!-- <div class="col my-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tbody>
                                <tr>
                                    <th scope="row" class="col-1">Nama </th>
                                    <td class="col-4">Ahmad Fauzi</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-1">NIS / NISN</th>
                                    <td class="col-4">123456 / 123450123450</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-1">Kelas</th>
                                    <td class="col-4">VIII A</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-1">Jenis Kelamin</th>
                                    <td class="col-4">Laki-Laki</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-1">TTL</th>
                                    <td class="col-4">Bayuwangi, 29-03-1998</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-1">Alamat</th>
                                    <td class="col-4">Blokagung, Karangdoro, Tegalsari, Banyuwangi</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-1">Nama Ayah</th>
                                    <td class="col-4">Sholikin</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="col-1">Asrama / Kamar</th>
                                    <td class="col-4">Al-Hikmah / G.01</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->

                <!-- TABEL Biodata Siswa -->
                <div class="card-body pb-4 px-3">
                    <div class="card border border-light" style="box-shadow: none;">

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                <div class="col">
                                    <p class="nav-link"><strong>NIS / NISN</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->nisn) :
                                            echo (@ucwords(session()->data->nisn));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: #fff;">
                                <div class="col">
                                    <p class="nav-link"><strong>Nama Lengkap</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->fullname) : echo (@ucwords(session()->data->fullname));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                <div class="col">
                                    <p class="nav-link"><strong>Kelas</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->kelas) : echo (@strtoupper(session()->data->kelas . "-" . ucwords(@session()->data->bagian)));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: #fff;">
                                <div class="col">
                                    <p class="nav-link"><strong>Asrama</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->asrama . @session()->data->kode) :
                                            echo (@ucwords(session()->data->asrama . "-" . ucwords(@session()->data->kode)));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                <div class="col">
                                    <p class="nav-link"><strong>Jenis Kelamin</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->gender) :
                                            echo (@ucwords(session()->data->gender));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: #fff;">
                                <div class="col">
                                    <p class="nav-link"><strong>TTL</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->tempatLahir . @session()->data->tanggalLahir) :
                                            echo (@ucwords(session()->data->tempatLahir . ", " . (@session()->data->tanggalLahir)));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                <div class="col">
                                    <p class="nav-link"><strong>Nama Ayah</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->namaAyah) :
                                            echo (@ucwords(session()->data->namaAyah));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: #fff;">
                                <div class="col">
                                    <p class="nav-link"><strong>Nama Ibu</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->namaIbu) :
                                            echo (@ucwords(session()->data->namaIbu));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row pt-2 pb-0" style="background-color: rgba(0, 0, 0, 0.02);">
                                <div class="col">
                                    <p class="nav-link"><strong>Alamat</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-auto">
                                    <p>
                                        <?php if (@session()->data->alamat) :
                                            echo (@ucwords(session()->data->alamat));
                                        else : ?><span class="text-danger text-small">Kosong</span>
                                        <?php endif;  ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
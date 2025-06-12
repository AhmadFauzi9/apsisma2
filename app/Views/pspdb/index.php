<?= $this->extend('templates/index') ?>

<?= $this->section('pspdb'); ?>
<!-- Syarat Pendaftaran -->
<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="card-header px-0 pt-0">
                        <i class="far fa-file-alt text-primary" style="font-size: 25px;"></i>
                        <h4>&nbsp;&nbsp;Syarat Pendaftaran</h4>
                    </div>

                    <!-- Alert -->
                    <?php if (!empty(session()->getFlashdata('daftar'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                <span>×</span>
                            </button>
                            <div class="text-left">
                                <?= @session()->daftar; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- TABEL Biodata Siswa -->
                    <div class="col my-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th class="text-primary text-center px-2 mx-0" scope="row">No</th>
                                        <th class="text-primary px-2 mx-0" scope="row">Persyaratan</th>
                                        <th class="text-primary px-2 mx-0">Berkas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">1</th>
                                        <td class="px-2 mx-0" colspan="2">Mengisi surat pernyataan</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">2</th>
                                        <td class="px-2 mx-0" colspan="2"><a href="#form-pendaftaran">Mengisi formulir pendaftaran</a></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">3</th>
                                        <td class="px-2 mx-0">Menyerahkan Fotocopy KK</td>
                                        <td class="px-2 mx-0">3 Lembar</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">4</th>
                                        <td class="px-2 mx-0">Fotocopy KTP Orang Tua/Wali</td>
                                        <td class="px-2 mx-0">3 Lembar</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">5</th>
                                        <td class="px-2 mx-0">Forocopy Kartu NISN (Nomor Induk Siswa Nasional)</td>
                                        <td class="px-2 mx-0">2 Lembar</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">6</th>
                                        <td class="px-2 mx-0">Fotocopy Ijazah Berlegalisir</td>
                                        <td class="px-2 mx-0">6 Lembar</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">7</th>
                                        <td class="px-2 mx-0">Fotocopy SHUN Berlegalisir</td>
                                        <td class="px-2 mx-0">6 Lembar</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">8</th>
                                        <td class="px-2 mx-0">Fotocopy Raport semester terakhir</td>
                                        <td class="px-2 mx-0">2 Lembar</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center px-2 mx-0" scope="row">9</th>
                                        <td class="px-2 mx-0">Fotocopy SKL (Surat Keterangan Lulus)</td>
                                        <td class="px-2 mx-0">6 Lembar</td>
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

<!-- Jadwal Pendaftaran -->
<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="card-header px-0 pt-0">
                        <i class="fa fa-calendar-check text-primary" style="font-size: 25px;"></i>
                        <h4>&nbsp;&nbsp;Agenda Pendaftaran</h4>
                    </div>

                    <!-- TABEL Biodata Siswa -->
                    <div class="col my-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tbody>
                                    <tr>
                                        <th class="text-center px-2 mx-0">1</th>
                                        <td class="px-2 mx-0" colspan="2">Jadwal Pendaftaran ONLINE</td>
                                        <td class="px-2 mx-0">1 Januari s/d 26 Juni 2022</td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="align-middle text-center px-2 mx-0">2</th>
                                        <td rowspan="2" class="align-middle px-2 mx-0">Jadwal Pendaftaran OFFLINE</td>
                                        <td class="px-2 mx-0">Gelombang I</td>
                                        <td class="px-2 mx-0">15 April s/d 26 April 2022</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 mx-0">Gelombang II</td>
                                        <td class="px-2 mx-0">22 Mei s/d 26 Juni 2022</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-center px-2 mx-0">3</th>
                                        <td class="px-2 mx-0" colspan="2">Masa ta'aruf santri baru</td>
                                        <td class="px-2 mx-0">29 Juni s/d 30 Juni 2022</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-center px-2 mx-0">4</th>
                                        <td class="px-2 mx-0" colspan="2">Acara pembukaan kegiatan belajar mengajar SLTP dan SLTA</td>
                                        <td class="px-2 mx-0">1 Juli 2022</td>
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

<!-- Form Pendaftaran -->
<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body" id="form-pendaftaran">

                    <div class="card-header px-0 pt-0">
                        <i class="fa fa-align-justify text-primary" style="font-size: 25px;"></i>
                        <h4>&nbsp;&nbsp;Formulir PSPDB MTsA</h4>
                    </div>

                    <p class="mt-2 mb-2">Bismillahirrohmanirrohim<br>Alhamdulillah kita akan memasuki tahun pembelajaran tahun 2022-2023 ini adalah form/formulir pendaftaran Online Gelombang-I</p>
                    <div class="text-danger py-2 px-3 mt-0 mb-4 color bg-light">
                        <li>Ketentuan : Isilah isian dibawah ini dengan Jujur, benar dan bisa dipertanggung jawabkan</li>
                    </div>

                    <hr>
                    <form action="<?= base_url() ?>/pspdb/daftar" method="post" class="my-3">

                        <?php $validatePspdb = \Config\Services::validation(); ?>

                        <div class="form-group">
                            <!-- Nama Calon Siswa -->
                            <div class="form-group mb-4">
                                <label for="nama" class="section-title pt-0 mt-3 mb-0">Nama Calon Siswa</label>
                                <footer class="text-primary mb-2">Isi nama sesuai dengan KK</footer>
                                <input type="text" name="fullname" value="<?= old('fullname') ?>" class="form-control rounded-pill <?= $validatePspdb->hasError('fullname') ? 'is-invalid' : null ?>" placeholder="Ahmad Fauzi">
                                <div class="invalid-feedback ml-3">
                                    <?= $validatePspdb->getError('fullname') ?>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group mb-4">
                                <label for="gender" class="section-title pt-0 mt-0 mb-0">Jenis Kelamin</label>
                                <footer class="text-primary mb-2">Pilih jenis kelamin anda</footer>
                                <div class="form-group my-0 pr-1">
                                    <select name="gender" value="<?= old('gender') ?>" class="form-control rounded-pill <?= $validatePspdb->hasError('gender') ? 'is-invalid' : null ?>">
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback ml-3">
                                        <?= $validatePspdb->getError('gender') ?>
                                    </div>
                                </div>
                            </div>

                            <!-- TTL -->
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-lg-6 col-md-auto">
                                        <label for="nama" class="section-title pt-0 mt-0">Tempat Lahir</label>
                                        <footer class="text-primary mb-2">Isi sesuai dengan KK</footer>
                                        <input type="text" name="tempatLahir" value="<?= old('tempatLahir') ?>" class="form-control rounded-pill <?= $validatePspdb->hasError('tempatLahir') ? 'is-invalid' : null ?>" placeholder="Banyuwangi">
                                        <div class="invalid-feedback ml-3">
                                            <?= $validatePspdb->getError('tempatLahir') ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-auto">
                                        <label for="nama" class="section-title pt-0 mt-0">Tanggal Lahir</label>
                                        <footer class="text-primary mb-2">Isi sesuai dengan KK</footer>
                                        <input type="date" name="tanggalLahir" value="<?= old('tanggalLahir') ?>" class="form-control rounded-pill <?= $validatePspdb->hasError('tanggalLahir') ? 'is-invalid' : null ?>">
                                        <div class="invalid-feedback ml-3">
                                            <?= $validatePspdb->getError('tanggalLahir') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nama Orang Tua -->
                            <div class="form-group mb-4">
                                <label for="nama" class="section-title pt-0 mt-0 mb-0">Nama Orang Tua/Wali</label>
                                <footer class="text-primary mb-2">Nama Bapak (Bisa juga walinya)</footer>
                                <input type="text" name="namaWali" value="<?= old('namaWali') ?>" class="form-control rounded-pill <?= $validatePspdb->hasError('namaWali') ? 'is-invalid' : null ?>" placeholder="Sholikin">
                                <div class="invalid-feedback ml-3">
                                    <?= $validatePspdb->getError('namaWali') ?>
                                </div>
                            </div>

                            <!-- Asal Sekolah SD/MI -->
                            <div class="form-group mb-4">
                                <label for="nama" class="section-title pt-0 mt-0 mb-0">Asal Sekolah SD/MI</label>
                                <footer class="text-primary mb-2">Contoh (SD Darussalam Blokagung / MI Miftahul Ulum Lamongan)</footer>
                                <input type="text" name="asalSekolah" value="<?= old('asalSekolah') ?>" class="form-control rounded-pill <?= $validatePspdb->hasError('asalSekolah') ? 'is-invalid' : null ?>" placeholder="SD Darussalam">
                                <div class="invalid-feedback ml-3">
                                    <?= $validatePspdb->getError('asalSekolah') ?>
                                </div>
                            </div>

                            <!-- Nomor WhatsApp -->
                            <div class="form-group mb-4">
                                <label for="nama" class="section-title pt-0 mt-0 mb-0">Nomor WA <span class="text-small">(WhatsApp)</span></label>
                                <footer class="text-primary mb-2">Isi dengan nomor WA yang aktif untuk konfirmasi dan info-info selanjutnya</footer>
                                <input type="text" name="nomorHp" value="<?= old('nomorHp') ?>" class="form-control rounded-pill <?= $validatePspdb->hasError('nomorHp') ? 'is-invalid' : null ?>" placeholder="081208085858">
                                <div class="invalid-feedback ml-3">
                                    <?= $validatePspdb->getError('nomorHp') ?>
                                </div>
                            </div>

                            <!-- Program Kelas -->
                            <div class="form-group mb-4">
                                <div class="form-group">
                                    <label class="d-block mb-0 section-title pt-0 mt-0">Program Kelas</label>
                                    <footer class="text-primary mb-2">Pilihlah salah satu program kelas yang diminati</footer>
                                    <div class="form-check py-1">
                                        <input value="tahfidz" class="form-check-input <?= $validatePspdb->hasError('programKelas') ? 'is-invalid' : null ?>" type="radio" name="programKelas" id="programKelas1">
                                        <label class="form-check-label" for="programKelas1">
                                            Kelas TAHFIDZ <span class="text-dark">(Hafalan Al-Qur'an)</span> untuk putra dan putri
                                        </label>
                                    </div>
                                    <div class="form-check py-1">
                                        <input value="mipa" class="form-check-input <?= $validatePspdb->hasError('programKelas') ? 'is-invalid' : null ?>" type="radio" name="programKelas" id="programKelas2">
                                        <label class="form-check-label" for="programKelas2">
                                            Kelas MIPA <span class="text-dark">(Matematika & IPA)</span> untuk putra dan putri
                                        </label>
                                    </div>
                                    <div class="form-check py-1">
                                        <input value="bahasa" class="form-check-input <?= $validatePspdb->hasError('programKelas') ? 'is-invalid' : null ?>" type="radio" name="programKelas" id="programKelas3">
                                        <label class="form-check-label" for="programKelas3">
                                            Kelas BAHASA <span class="text-dark">(Language)</span> untuk putra dan putri
                                        </label>
                                    </div>
                                    <div class="form-check py-1">
                                        <input value="bina-bakat" class="form-check-input <?= $validatePspdb->hasError('programKelas') ? 'is-invalid' : null ?>" type="radio" name="programKelas" id="programKelas4">
                                        <label class="form-check-label" for="programKelas4">
                                            Kelas BINA BAKAT <span class="text-dark">(Kelas siswa berprestasi dibidang non-akademik baik olah raga maupun seni)</span> untuk putra dan putri
                                        </label>
                                    </div>
                                    <div class="form-check py-1">
                                        <input value="terpadu" class="form-check-input <?= $validatePspdb->hasError('programKelas') ? 'is-invalid' : null ?>" type="radio" name="programKelas" id="programKelas5">
                                        <label class="form-check-label" for="programKelas5">
                                            Kelas TERPADU <span class="text-dark">(Khusus anak desa yang tidak Mondok)</span> perpaduan Kurikulum dan madin untuk putra dan putri
                                        </label>
                                    </div>
                                    <div class="form-check py-1">
                                        <input value="reguler" class="form-check-input <?= $validatePspdb->hasError('programKelas') ? 'is-invalid' : null ?>" type="radio" name="programKelas" id="programKelas6">
                                        <label class="form-check-label" for="programKelas6">
                                            Kelas REGULER untuk putra dan putri
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Ekstrakulikuler -->
                            <div class="form-group mb-4">
                                <div class="form-group">
                                    <label class="d-block mb-0 section-title pt-0 mt-0">Kegiatan Ektrakurikuler</label>
                                    <footer class="text-primary mb-2">Pilhlah salah satu program kegiatan Ekstrakulikuler sesuai dengan minat dan bakatnya</footer>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-auto">
                                            <div class="form-check py-1">
                                                <input value="Pramuka" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler1">
                                                <label class="form-check-label" for="extrakulikuler1">
                                                    Pramuka
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Roket-Air" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler2">
                                                <label class="form-check-label" for="extrakulikuler2">
                                                    Roket Air
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Fachiaal" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler3">
                                                <label class="form-check-label" for="extrakulikuler3">
                                                    Fachiaal
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Drumband" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler4">
                                                <label class="form-check-label" for="extrakulikuler4">
                                                    Drumband
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Seni-Silat" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler5">
                                                <label class="form-check-label" for="extrakulikuler5">
                                                    Seni Silat
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Gamelan" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler6">
                                                <label class="form-check-label" for="extrakulikuler6">
                                                    Gamelan
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Makram" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler7">
                                                <label class="form-check-label" for="extrakulikuler7">
                                                    Makram
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Tata-Busana" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler8">
                                                <label class="form-check-label" for="extrakulikuler8">
                                                    Tata Busana
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Tata-Rias" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler9">
                                                <label class="form-check-label" for="extrakulikuler9">
                                                    Tata Rias
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Teater" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler10">
                                                <label class="form-check-label" for="extrakulikuler10">
                                                    Teater
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-auto">
                                            <div class="form-check py-1">
                                                <input value="Robotik" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler11">
                                                <label class="form-check-label" for="extrakulikuler11">
                                                    Robotik
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Paskibraka" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler12">
                                                <label class="form-check-label" for="extrakulikuler12">
                                                    Paskibraka
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="KIR-(Karya-Ilmiah-Remaja)" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler13">
                                                <label class="form-check-label" for="extrakulikuler13">
                                                    KIR (Karya Ilmiah Remaja)
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Teknik-Kendaraan-Ringan" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler14">
                                                <label class="form-check-label" for="extrakulikuler14">
                                                    Teknik Kendaraan Ringan
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Desain-Grafis" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler15">
                                                <label class="form-check-label" for="extrakulikuler15">
                                                    Desain Grafis
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Sepak-Bola" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler16">
                                                <label class="form-check-label" for="extrakulikuler16">
                                                    Sepak Bola
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Bola-Voly" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler17">
                                                <label class="form-check-label" for="extrakulikuler17">
                                                    Bola Voly
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Tenis-Meja" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler18">
                                                <label class="form-check-label" for="extrakulikuler18">
                                                    Tenis Meja
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Bulu-Tangkis" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler19">
                                                <label class="form-check-label" for="extrakulikuler19">
                                                    Bulu Tangkis
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Melukis" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler20">
                                                <label class="form-check-label" for="extrakulikuler20">
                                                    Melukis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="form-check py-1">
                                                <input value="Qiro’ah" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler21">
                                                <label class="form-check-label" for="extrakulikuler21">
                                                    Qiro’ah
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Pidato-3-Bahasa" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler22">
                                                <label class="form-check-label" for="extrakulikuler22">
                                                    Pidato 3 Bahasa
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Musik" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler23">
                                                <label class="form-check-label" for="extrakulikuler23">
                                                    Musik
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Paduan-Suara" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler24">
                                                <label class="form-check-label" for="extrakulikuler24">
                                                    Paduan Suara
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Batik" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler25">
                                                <label class="form-check-label" for="extrakulikuler25">
                                                    Batik
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="PMR" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler26">
                                                <label class="form-check-label" for="extrakulikuler26">
                                                    PMR
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Jurnalistik" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler27">
                                                <label class="form-check-label" for="extrakulikuler27">
                                                    Jurnalistik
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Ketrampilan" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler28">
                                                <label class="form-check-label" for="extrakulikuler28">
                                                    Ketrampilan
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Rebana" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler29">
                                                <label class="form-check-label" for="extrakulikuler29">
                                                    Rebana
                                                </label>
                                            </div>
                                            <div class="form-check py-1">
                                                <input value="Kaligrafi" class="form-check-input <?= $validatePspdb->hasError('extrakulikuler') ? 'is-invalid' : null ?>" type="radio" name="extrakulikuler" id="extrakulikuler30">
                                                <label class="form-check-label" for="extrakulikuler30">
                                                    Kaligrafi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <button id="kirimJawaban" class="btn btn-primary mt-2" type="submit">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    Kirim Jawaban
                                </button>
                            </div>
                            <div class="col">
                                <div class="form-group text-right">
                                    <label for="tombolOnOff" class="custom-switch mt-3 pl-0">
                                        <span class="text-small text-muted text-right">Matikan tombol kirim jawaban jika pendaftaran sudah tutup &nbsp;</span>
                                        <input type="checkbox" id="tombolOnOff" name="custom-switch-checkbox" class="custom-switch-input pb-0 mb-0" onclick="TombolOnOff();">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let kirim = document.getElementById("kirimJawaban");
    let checkbox = document.getElementById("tombolOnOff");
    checkbox.checked = true;

    function TombolOnOff() {
        if (checkbox.checked == true) {
            kirim.disabled = false;
        } else {
            kirim.disabled = true;
        }
    }
</script>
<?= $this->endSection(); ?>
<!-- Modal Form Login-->
<div class="modal fade" id="editProfile" data-backdrop="static" data-keyboard="false" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Edit Biodata Diri</h5>
                <button type="button" class="close pt-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-2 mx-2">
                <div class="text-center">

                    <form method="post" action="<?= base_url() ?>/siswa/edit/<?= ($dataStudent->username) ?>">

                        <?php $validation = \Config\Services::validation(); ?>
                        <?= csrf_field() ?>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <input type="text" name="username" value="<?= ($dataStudent->username) ?>" class="form-control rounded-pill <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="NIS" disabled>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('username') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <input type="text" name="nisn" value="<?= $dataStudent->nisn ?>" class="form-control rounded-pill <?= $validation->hasError('nisn') ? 'is-invalid' : null ?>" placeholder="NISN" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('nisn') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <input id="fullname" type="text" name="fullname" value="<?= $dataStudent->fullname ?>" class="form-control rounded-pill <?= $validation->hasError('fullname') ? 'is-invalid' : null ?>" placeholder="Nama Lengkap" autofocus>
                            <div class="invalid-feedback text-left ml-3">
                                <?= $validation->getError('fullname') ?>
                            </div>
                        </div>

                        <div class="form-group text-left ml-1 mb-3">
                            <label class="d-block text-left">Jenis Kelamin</label>
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-check-label ml-2" for="laki-laki">
                                            <input type="radio" name="gender" value="laki-laki" <?= ($dataStudent->gender == "laki-laki") ? 'checked' : false; ?> class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : null ?>" id="laki-laki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label ml-2" for="perempuan">
                                            <input type="radio" name="gender" value="perempuan" <?= ($dataStudent->gender == "perempuan") ? 'checked' : false; ?> class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : null ?>" id="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <input type="text" name="kelas" value="<?= $dataStudent->kelas ?>" class="form-control rounded-pill<?= $validation->hasError('kelas') ? 'is-invalid' : null ?>" placeholder="Kelas" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('kelas') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <input type="text" name="bagian" value="<?= $dataStudent->bagian ?>" class="form-control rounded-pill<?= $validation->hasError('bagian') ? 'is-invalid' : null ?>" placeholder="Bagian" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('bagian') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <input type="text" name="asrama" value="<?= $dataStudent->asrama ?>" class="form-control rounded-pill<?= $validation->hasError('asrama') ? 'is-invalid' : null ?>" placeholder="Asrama" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('asrama') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <input type="text" name="kode" value="<?= $dataStudent->kode ?>" class="form-control rounded-pill<?= $validation->hasError('kode') ? 'is-invalid' : null ?>" placeholder="Kode Kamar" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('kode') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-2 mt-0 pt-0">
                            <input name="tempatLahir" id="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?= $dataStudent->tempatLahir ?>" class="form-control rounded-pill<?= $validation->hasError('tempatLahir') ? 'is-invalid' : null ?>" autofocus>
                            <div class="invalid-feedback text-left ml-3">
                                <?= $validation->getError('tempatLahir') ?>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <input name="tanggalLahir" id="tanggalLahir" type="date" placeholder="Tanggal Lahir. Contoh : 29/03/2022" value="<?= $dataStudent->tanggalLahir ?>" class="form-control rounded-pill<?= $validation->hasError('tanggalLahir') ? 'is-invalid' : null ?>" autofocus>
                            <div class="invalid-feedback text-left ml-3">
                                <?= $validation->getError('tanggalLahir') ?>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <input type="text" name="namaAyah" value="<?= $dataStudent->namaAyah ?>" class="form-control rounded-pill<?= $validation->hasError('namaAyah') ? 'is-invalid' : null ?>" placeholder="Nama Ayah" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('namaAyah') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <input type="text" name="namaIbu" value="<?= $dataStudent->namaIbu ?>" class="form-control rounded-pill<?= $validation->hasError('namaIbu') ? 'is-invalid' : null ?>" placeholder="Nama Ibu" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('namaIbu') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <input id="nomorHp" type="text" name="nomorHp" value="<?= $dataStudent->nomorHp ?>" class="form-control rounded-pill <?= $validation->hasError('nomorHp') ? 'is-invalid' : null ?>" placeholder="Nomor Telepon" autofocus>
                            <div class="invalid-feedback text-left ml-3">
                                <?= $validation->getError('nomorHp') ?>
                            </div>
                        </div>

                        <label class="d-block text-left text-dark">Alamat Lengkap</label>
                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <select id="provinsi" name="provinsi" class="custom-select rounded-pill <?= $validation->hasError('provinsi') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Provinsi</option>
                                    <?php foreach ($listProvinsi as $value) : ?>
                                        <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <select id="kabupaten" name="kabupaten" class="custom-select rounded-pill <?= $validation->hasError('kabupaten') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Kabupaten</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('kabupaten') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <select id="kecamatan" name="kecamatan" class="custom-select rounded-pill <?= $validation->hasError('kecamatan') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Kecamatan</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('kecamatan') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <select id="desa" name="desa" class="custom-select rounded-pill <?= $validation->hasError('desa') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Desa</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('desa') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <input type="text" id="dusun" name="dusun" value="<?= @$dataStudent->dusun ?>" class="form-control rounded-pill <?= $validation->hasError('dusun') ? 'is-invalid' : null ?>" placeholder="Dusun">
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('dusun') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <input type="text" id="kodePos" name="kodePos" value="<?= @$dataStudent->kodePos ?>" class="form-control rounded-pill<?= $validation->hasError('kodePos') ? 'is-invalid' : null ?>" placeholder="Kode Pos" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validation->getError('kodePos') ?>
                                </div>
                            </div>
                        </div>

                        <hr class="pb-2 mt-4">
                        <div class="form-group my-3">
                            <button type="submit" class="btn btn-primary btn-block btn-lg rounded-pill">
                                <i class="fas fa-sign-in-alt"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
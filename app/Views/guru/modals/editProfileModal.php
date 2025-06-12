<!-- Modal Form Login-->
<div class="modal fade" id="editProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
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

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                <span>×</span>
                            </button>
                            <div class="text-small text-left">
                                <?= @session()->error['usernameAlert']; ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <form method="post" action="<?= base_url() ?>/guru/edit/<?= ($dataTeachers->username) ?>">
                        <?php $validationGuru = \Config\Services::validation(); ?>
                        <?= csrf_field() ?>

                        <div class="row mb-3 mt-3 py-0">
                            <div class="form-group my-0 pr-1 col">
                                <input name="fullname2" id="fullname" type="text" placeholder="Nama Lengkap" value="<?= $dataTeachers->fullname ?>" class="form-control rounded-pill <?= ($validationGuru->hasError('fullname2')) ? 'is-invalid' : null ?>" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= ($validationGuru->getError('fullname')) ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-4">
                                <input name="title2" id="title" type="text" placeholder="Gelar" value="<?= $dataTeachers->title ?>" class="form-control rounded-pill <?= ($validationGuru->hasError('title2')) ? 'is-invalid' : null ?>" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= ($validationGuru->getError('title2')) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-left ml-1 mb-3">
                            <label class="d-block text-left">Jenis Kelamin</label>
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-check-label ml-2" for="laki-laki">
                                            <input type="radio" name="gender2" value="laki-laki" <?= ($dataTeachers->gender == "laki-laki") ? 'checked' : false; ?> class="form-check-input <?= ($validationGuru->hasError('gender2')) ? 'is-invalid' : null ?>" id="laki-laki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label ml-2" for="perempuan">
                                            <input type="radio" name="gender2" value="perempuan" <?= ($dataTeachers->gender == "perempuan") ? 'checked' : false; ?> class="form-check-input <?= ($validationGuru->hasError('gender2')) ? 'is-invalid' : null ?>" id="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <input type="text" name="jabatan2" value="<?= $dataTeachers->jabatan ?>" class="form-control rounded-pill <?= ($validationGuru->hasError('jabatan2')) ? 'is-invalid' : null ?>" placeholder="Jabatan" autofocus>
                        </div>

                        <div class="form-group mb-2 mt-0 pt-0">
                            <input name="tempatLahir2" id="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?= @$dataTeachers->tempatLahir ?>" class="form-control rounded-pill <?= ($validationGuru->hasError('tempatLahir2')) ? 'is-invalid' : null ?>" autofocus>
                        </div>

                        <div class="form-group my-3">
                            <input name="tanggalLahir2" id="tanggalLahir" type="date" placeholder="Tanggal Lahir. Contoh : 29/03/2022" value="<?= $dataTeachers->tanggalLahir ?>" class="form-control rounded-pill <?= ($validationGuru->hasError('tanggalLahir2')) ? 'is-invalid' : null ?>" autofocus>
                        </div>

                        <div class="row mb-3 mt-3 py-0">
                            <div class="form-group my-0 pr-1 col-6">
                                <input name="nip2" id="nip" type="text" placeholder="NIP" value="<?= @$dataTeachers->nip ?>" class="form-control rounded-pill <?= (@$validationGuru->hasError('nip2')) ? 'is-invalid' : null ?>" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= (@$validationGuru->getError('nip2')) ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <input name="nipy2" id="nipy" type="text" placeholder="NIPY" value="<?= @$dataTeachers->nipy ?>" class="form-control rounded-pill <?= (@$validationGuru->hasError('nipy2')) ? 'is-invalid' : null ?>" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= (@$validationGuru->getError('nipy2')) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <input name="nomorHp2" id="nomorHp" type="text" placeholder="Nomor Hp / WhatsApp" value="<?= $dataTeachers->nomorHp ?>" class="form-control rounded-pill <?= ($validationGuru->hasError('nomorHp2')) ? 'is-invalid' : null ?>" autofocus>
                        </div>

                        <label class="d-block text-left text-dark">Alamat Lengkap</label>
                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <select id="provinsi" name="provinsi" class="custom-select rounded-pill <?= $validationGuru->hasError('provinsi') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Provinsi</option>
                                    <?php foreach ($listProvinsi as $value) : ?>
                                        <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <select id="kabupaten" name="kabupaten" class="custom-select rounded-pill <?= $validationGuru->hasError('kabupaten') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Kabupaten</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validationGuru->getError('kabupaten') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <select id="kecamatan" name="kecamatan" class="custom-select rounded-pill <?= $validationGuru->hasError('kecamatan') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Kecamatan</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validationGuru->getError('kecamatan') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <select id="desa" name="desa" class="custom-select rounded-pill <?= $validationGuru->hasError('desa') ? 'is-invalid' : null ?>">
                                    <option selected value="''">Pilih Desa</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validationGuru->getError('desa') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="form-group my-0 pr-1 col-6">
                                <input type="text" id="dusun" name="dusun" value="<?= @$dataTeachers->dusun ?>" class="form-control rounded-pill <?= $validationGuru->hasError('dusun') ? 'is-invalid' : null ?>" placeholder="Dusun">
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validationGuru->getError('dusun') ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-6">
                                <input type="text" id="kodePos" name="kodePos" value="<?= @$dataTeachers->kodePos ?>" class="form-control rounded-pill<?= $validationGuru->hasError('kodePos') ? 'is-invalid' : null ?>" placeholder="Kode Pos" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= $validationGuru->getError('kodePos') ?>
                                </div>
                            </div>
                        </div>

                        <hr class="pb-2 mt-4">
                        <div class="form-group my-3">
                            <button type="submit" class="btn btn-primary btn-block btn-lg rounded-pill" tabindex="4">
                                <i class="fas fa-save"></i>
                                &ensp;Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
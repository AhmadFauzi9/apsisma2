<!-- Modal Form Login-->
<div class="modal fade" id="formLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formLoginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="col justify-content-end mt-2">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="card-title pb-2">
                    <h6 class="text-center mt-2 pt-3 mb-0 text-primary">Create an Account</h6>
                </div>

                <nav class="px-4 ">
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <a class="px-4 nav-link" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab">Admin</a>
                        <a class="px-4 nav-link" id="nav-guru-tab" data-toggle="tab" href="#nav-guru" role="tab">Guru</a>
                        <a class="px-4 nav-link " id="nav-siswa-tab" data-toggle="tab" href="#nav-siswa" role="tab">Siswa</a>
                    </div>
                </nav>

                <div class="card-body pt-0">
                    <div class="tab-content" id="nav-tabContent">

                        <!-- Register Admin -->
                        <div class="tab-pane fade show" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
                            <!-- Form Register -->
                            <form method="post" action="<?= base_url(); ?>/registermodal/prosesadmin">
                                <?php $validationAdmin = \Config\Services::validation(); ?>
                                <?= csrf_field() ?>
                                <div class="form-group mb-3 mt-3">
                                    <input name="username1" id="username" type="text" placeholder="Username" value="<?= old('username1') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('username1') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationAdmin->getError('username1') ?>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3 py-0">
                                    <div class="form-group my-0 pr-1 col">
                                        <input name="fullname1" id="fullname" type="text" placeholder="Nama Lengkap" value="<?= old('fullname1') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('fullname1') ? 'is-invalid' : null ?>" autofocus>
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationAdmin->getError('fullname1') ?>
                                        </div>
                                    </div>
                                    <div class="form-group my-0 pl-1 col-4">
                                        <input name="title1" id="title" type="text" placeholder="Gelar" value="<?= old('title1') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('title1') ? 'is-invalid' : null ?>" autofocus>
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationAdmin->getError('title1') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 ml-2 text-left">
                                    <label class="d-block text-left mb-0 pb-0">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check d-inline">
                                                <input value="laki-laki" class="form-check-input mt-2 <?= $validationAdmin->hasError('gender1') ? 'is-invalid' : null ?>" type="radio" name="gender1" id="laki-laki">
                                                <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                                <div class="invalid-feedback text-left ml-3 pl-1 mt-0">
                                                    <?= $validationAdmin->getError('gender1') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check d-inline">
                                                <input value="perempuan" class="form-check-input mt-2 <?= $validationAdmin->hasError('gender1') ? 'is-invalid' : null ?>" type="radio" name="gender1" id="perempuan">
                                                <label class="form-check-label" for="perempuan">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="tempatLahir1" id="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?= old('tempatLahir1') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('tempatLahir1') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationAdmin->getError('tempatLahir1') ?>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="tanggalLahir1" id="tanggalLahir" type="date" placeholder="Tanggal Lahir. Contoh : 29/03/2022" value="<?= old('tanggalLahir1') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('tanggalLahir1') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationAdmin->getError('tanggalLahir1') ?>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="password1" id="password" type="password" placeholder="Password" class="form-control rounded-pill pwstrength <?= $validationAdmin->hasError('password1') ? 'is-invalid' : null ?>" data-indicator="pwindicator" autocomplete="off">
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationAdmin->getError('password1') ?>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="pass_confirm1" id="password2" type="password" placeholder="Konfirmasi Password" class="form-control rounded-pill <?= $validationAdmin->hasError('pass_confirm1') ? 'is-invalid' : null ?>" data-indicator="pwindicator" autocomplete="off">
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationAdmin->getError('pass_confirm1') ?>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-4">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block rounded-pill">Register Admin</button>
                                </div>
                            </form>
                        </div>
                        <!-- End 0f Register Admin -->

                        <!-- Register Guru -->
                        <div class="tab-pane fade show" id="nav-guru" role="tabpanel" aria-labelledby="nav-guru-tab">
                            <!-- Form Register -->
                            <form method="post" action="<?= base_url(); ?>/registermodal/prosesguru">
                                <?php $validationGuru = $this->validation = \Config\Services::validation(); ?>
                                <?= csrf_field() ?>
                                <div class="form-group mb-3 mt-3">
                                    <input name="username2" id="username" type="text" placeholder="Username" value="<?= old('username2') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('username2') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationGuru->getError('username2') ?>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3 py-0">
                                    <div class="form-group my-0 pr-1 col">
                                        <input name="fullname2" id="fullname" type="text" placeholder="Nama Lengkap" value="<?= old('fullname2') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('fullname2') ? 'is-invalid' : null ?>" autofocus>
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationGuru->getError('fullname2') ?>
                                        </div>
                                    </div>
                                    <div class="form-group my-0 pl-1 col-4">
                                        <input name="title2" id="title" type="text" placeholder="Gelar" value="<?= old('title2') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('title2') ? 'is-invalid' : null ?>" autofocus>
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationGuru->getError('title2') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 ml-2 text-left">
                                    <label class="d-block text-left mb-0 pb-0">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check d-inline">
                                                <input value="laki-laki" class="form-check-input mt-2 <?= $validationAdmin->hasError('gender2') ? 'is-invalid' : null ?>" type="radio" name="gender2" id="laki-laki2">
                                                <label class="form-check-label" for="laki-laki2">Laki-laki</label>
                                                <div class="invalid-feedback text-left ml-3 pl-1 mt-0">
                                                    <?= $validationGuru->getError('gender2') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check d-inline">
                                                <input value="perempuan" class="form-check-input mt-2 <?= $validationAdmin->hasError('gender2') ? 'is-invalid' : null ?>" type="radio" name="gender2" id="perempuan2">
                                                <label class="form-check-label" for="perempuan2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="tempatLahir2" id="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?= old('tempatLahir2') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('tempatLahir2') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationGuru->getError('tempatLahir2') ?>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="tanggalLahir2" id="tanggalLahir" type="date" placeholder="Tanggal Lahir. Contoh : 29/03/2022" value="<?= old('tanggalLahir2') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('tanggalLahir2') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationGuru->getError('tanggalLahir2') ?>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="password2" id="password" type="password" placeholder="Password" class="form-control rounded-pill pwstrength <?= $validationAdmin->hasError('password2') ? 'is-invalid' : null ?>" data-indicator="pwindicator" autocomplete="off">
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationGuru->getError('password2') ?>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="pass_confirm2" id="password2" type="password" placeholder="Konfirmasi Password" class="form-control rounded-pill <?= $validationAdmin->hasError('pass_confirm2') ? 'is-invalid' : null ?>" data-indicator="pwindicator" autocomplete="off">
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationGuru->getError('pass_confirm2') ?>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-4">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block rounded-pill">Register Guru</button>
                                </div>
                            </form>
                        </div>
                        <!-- End 0f Register Guru -->

                        <!-- Register Siswa -->
                        <div class="tab-pane fade show" id="nav-siswa" role="tabpanel" aria-labelledby="nav-siswa-tab">

                            <!-- Form Register -->
                            <form method="post" action="<?= base_url(); ?>/registerModal/prosessiswa">
                                <?php $validationSiswa = $this->validation = \Config\Services::validation(); ?>
                                <?= csrf_field() ?>

                                <div class="row mb-3 mt-3 py-0">
                                    <div class="form-group my-0 pr-1 col-6">
                                        <input name="username" id="username" type="text" placeholder="NIS" value="<?= old('username') ?>" class="form-control rounded-pill <?= $validationSiswa->hasError('username') ? 'is-invalid' : null ?>" autofocus>
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationSiswa->getError('username') ?>
                                        </div>
                                    </div>
                                    <div class="form-group my-0 pl-1 col-6">
                                        <input name="password" id="password" type="password" placeholder="Password" value="<?= old('password') ?>" class="form-control rounded-pill <?= $validationSiswa->hasError('password') ? 'is-invalid' : null ?>" autofocus autocomplete="off">
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationSiswa->getError('password') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="fullname" id="fullname" type="text" placeholder="Nama Lengkap" value="<?= old('fullname') ?>" class="form-control rounded-pill <?= $validationSiswa->hasError('fullname') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationSiswa->getError('fullname') ?>
                                    </div>
                                </div>
                                <div class="row my-3 py-0">
                                    <div class="form-group my-0 pr-1 col-6">
                                        <input name="kelas" id="kelas" type="text" placeholder="Kelas" value="<?= old('kelas') ?>" class="form-control rounded-pill <?= $validationSiswa->hasError('kelas') ? 'is-invalid' : null ?>" autofocus>
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationSiswa->getError('kelas') ?>
                                        </div>
                                    </div>
                                    <div class="form-group my-0 pl-1 col-6">
                                        <input name="bagian" id="bagian" type="text" placeholder="Bagian" value="<?= old('bagian') ?>" class="form-control rounded-pill <?= $validationSiswa->hasError('bagian') ? 'is-invalid' : null ?>" autofocus>
                                        <div class="invalid-feedback text-left ml-3">
                                            <?= $validationSiswa->getError('bagian') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 ml-2 text-left">
                                    <label class="d-block text-left mb-0 pb-0">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check d-inline">
                                                <input value="laki-laki" class="form-check-input mt-2 <?= $validationSiswa->hasError('gender') ? 'is-invalid' : null ?>" type="radio" name="gender" id="laki-laki3">
                                                <label class="form-check-label" for="laki-laki3">Laki-laki</label>
                                                <div class="invalid-feedback text-left ml-3 pl-1 mt-0">
                                                    <?= $validationSiswa->getError('gender') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check d-inline">
                                                <input value="perempuan" class="form-check-input mt-2 <?= $validationSiswa->hasError('gender') ? 'is-invalid' : null ?>" type="radio" name="gender" id="perempuan3">
                                                <label class="form-check-label" for="perempuan3">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="tempatLahir" id="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?= old('tempatLahir') ?>" class="form-control rounded-pill <?= $validationSiswa->hasError('tempatLahir') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationSiswa->getError('tempatLahir') ?>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <input name="tanggalLahir" id="tanggalLahir" type="date" placeholder="Tanggal Lahir. Contoh : 29/03/2022" value="<?= old('tanggalLahir') ?>" class="form-control rounded-pill <?= $validationSiswa->hasError('tanggalLahir') ? 'is-invalid' : null ?>" autofocus>
                                    <div class="invalid-feedback text-left ml-3">
                                        <?= $validationSiswa->getError('tanggalLahir') ?>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-4">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block rounded-pill">Register Siswa</button>
                                </div>
                            </form>
                        </div>
                        <!-- End 0f Register Siswa -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->extend('auth/template/index') ?>

<?= $this->section('register') ?>
<section class="section">
    <div class="container mt-5">
        <div class="row justify-content-center mb-0 pb-0">
            <div class="col-lg-6 col-md-auto">
                <div class="card text-center">
                    <div class="col">
                        <div class="card-titile pb-4">
                            <h6 class="text-center mt-4 pt-3 mb-0 text-primary">Create an Account</h6>
                        </div>

                        <nav class="px-4 ">
                            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                <a class="px-4 nav-link" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab">Admin</a>
                                <a class="px-4 nav-link" id="nav-guru-tab" data-toggle="tab" href="#nav-guru" role="tab">Guru</a>
                            </div>
                        </nav>

                        <div class="card-body pt-0">
                            <div class="tab-content" id="nav-tabContent">

                                <!-- Register Admin -->
                                <div class="tab-pane fade show" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
                                    <!-- Form Register -->
                                    <form method="post" action="<?= base_url(); ?>/register/prosesadmin">
                                        <?php $validationAdmin = \Config\Services::validation(); ?>
                                        <?= csrf_field() ?>
                                        <div class="form-group mb-3 mt-3">
                                            <input name="name1" id="name" type="text" placeholder="Nama Lengkap" value="<?= old('name1') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('name1') ? 'is-invalid' : null ?>" autofocus>
                                            <div class="invalid-feedback text-left ml-3">
                                                <?= $validationAdmin->getError('name1') ?>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 mt-3">
                                            <input name="username1" id="username" type="text" placeholder="Username" value="<?= old('username1') ?>" class="form-control rounded-pill <?= $validationAdmin->hasError('username1') ? 'is-invalid' : null ?>" autofocus>
                                            <div class="invalid-feedback text-left ml-3">
                                                <?= $validationAdmin->getError('username1') ?>
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
                                    <form method="post" action="<?= base_url(); ?>/register/prosesguru">
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

                            </div>
                        </div>
                        <div class="card-titile pb-4">
                            <div class="text-center text-small pt-1 pb-3">
                                <span> Already have an account? </span>
                                <a href="<?= base_url('login'); ?>">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center text-small text-light pb-4">
            Copyright &copy; MTs Al-Amiriyyah <?= date('Y') ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->extend('auth/template/index'); ?>

<?= $this->section('login'); ?>
<section class="section">
    <div class="container mt-4">
        <div class="row justify-content-center mb-0 pb-0">
            <div class="col-lg-5 col-md-auto">
                <div class="card">
                    <div class="text-center p-4 m-3">
                        <img src="<?= base_url(); ?>/templates/assets/img/logo/mtsa-new.png" alt="logo" width="80" class="mb-4 mt-2">
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Apsisma</span></h4>
                        <p class="text-muted text-small">Nikmati cara mudah untuk mendapatkan informasi siswa-siswi <br> MTs Al-Amiriyyah Blokagung hanya via Smartphone.</p>

                        <!-- Alert Error Login -->
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                    <span>×</span>
                                </button>
                                <div class="text-small text-left">
                                    <?= @session()->error['usernameAlert']; ?>
                                    <?= @session()->error['passwordAlert']; ?>
                                </div>
                            </div>
                            <!-- Alert berhasil register -->
                        <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                    <span>×</span>
                                </button>
                                <div class="text-small text-left">
                                    <?= @session()->success; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Form Login -->
                        <!-- <form method="post" action="<?= base_url() ?>/login/proses" class="needs-validation"> -->
                        <form method="post" action="<?= base_url(); ?>" class="needs-validation">
                            <?= csrf_field(); ?>

                            <div class="form-group my-2">
                                <input type="text" name="username" required class="form-control rounded-pill <?php if (@session()->error['usernameAlert']) : ?>is-invalid<?php endif ?>" placeholder="Username/NIS" autofocus>
                            </div>

                            <div class="form-group my-2">
                                <input id="password" type="password" name="password" required class="form-control rounded-pill <?php if (@session()->error['passwordAlert']) : ?>is-invalid<?php endif ?>" placeholder="Password" autofocus>
                            </div>

                            <div class="form-group my-2">
                                <button type="submit" class="btn btn-primary btn-block btn-lg rounded-pill" tabindex="4">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Login
                                </button>
                            </div>

                            <div class="text-center text-small pt-2">
                                <a href="<?= route_to('register') ?>">Create an Account</a>
                                <span> | </span>
                                <a href="<?= route_to('forgot') ?>">Forgot Password</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-center text-light text-small pb-4">
            Copyright &copy; MTs Al-Amiriyyah <?= date('Y') ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->extend('auth/template/index'); ?>

<?= $this->section('forgot') ?>
<section class="section">
    <div class="container pt-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-auto">
                <div class="card text-center">
                    <div class="col py-2">
                        <div class="card-body">
                            <h6 class="text-center my-2 pb-3 text-primary">Forgot Password</h6>
                            <p class="pb-2">Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                            <form method="POST">
                                <div class="form-group my-3">
                                    <input id="email" type="email" placeholder="Email" class="form-control rounded-pill" name="email" tabindex="1" required autofocus>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill" tabindex="4">
                                        Forgot Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center text-light text-small">
                    Copyright &copy; MTs Al-Amiriyyah <?= date('Y') ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>
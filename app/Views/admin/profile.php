<?= $this->extend('templates/index') ?>

<!-- BIODATA SISWA ---------------------------------------------------------------------------------------------------------- -->
<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h1>Users Siswa</h1>
        <div class="section-header-breadcrumb">
            <ol class="breadcrumb bg-transparent px-0 my-0 py-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/menu/">Dashboard</a></li>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/userAdmin/">Users Admin</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/detail/<?= @$dataAdmins->username ?>">Detail Admin</a></div>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('profile-admin'); ?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- MODAL EDIT PROFILE ---------------------------------------------------------------------------------------------------------- -->
<!-- = $this->include('/admin/modals/editProfileModal') ?> -->
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
            <div class="card card-statistic-1 pb-2">
                <!-- JUDUL -->
                <div class="row card-body pl-0 mr-4 ml-2 mb-3">
                    <div class="col">
                        <div class="card-header px-0 mx-0">
                            <div class="section-title mt-0">
                                <h5 class="text-primary">
                                    <?= $judul ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-2 col-md-auto">
                        <div class="card-header text-right px-0 pt-3 mx-0">
                            <a href="#" class="btn btn-warning py-0" data-toggle="modal" data-target="#editProfile">Edit</a>
                        </div>
                    </div> -->
                </div>

                <!-- Alert -->
                <div class="mx-3">
                    <?php if (!empty(session()->getFlashdata('update'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                <span>×</span>
                            </button>
                            <div class="text-small text-left">
                                <?= session()->getFlashdata('update'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col pb-3">
                    <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                        <div class="col">
                            <div class="pb- pt-1 px-0 px-0"><strong>Nama Lengkap</strong></div>
                        </div>

                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= @ucwords($dataAdmins->name) ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: #fff;">
                        <div class="col">
                            <div class="pb-0 pt-1 px-0"><strong>Username</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= @($dataAdmins->username) ? @(@ucwords($dataAdmins->username)) : '<span class="text-danger text-small">Kosong</span>'; ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<?= $this->endSection(); ?>s
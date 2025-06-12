<?= $this->extend('templates/index') ?>

<!-- KONTAK GURU ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('kontak'); ?>
<section class="section">
    <div class="row">
        <div class="col">
            <div class="card card-statistic-1">
                <!-- JUDUL -->
                <div class="row card-body pl-0 mr-4 ml-2">
                    <div class="col">
                        <div class="card-header px-0 mx-0">
                            <h5 class="text-primary">
                                <i class="fas fa-phone-square text-primary" style="font-size: 25px;"></i>
                                &nbsp;Kontak
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- TABEL SPP -->
                <div class="row mx-1">
                    <div class="col my-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-md">
                                <thead>

                                    <tr>
                                        <th scope="row" class="col-1 text-center text-primary">No</th>
                                        <th scope="row" class="col-5 text-primary">Nama</th>
                                        <th scope="row" class="col-3 text-primary">Status</th>
                                        <th scope="row" class="col-2 text-primary">Telepon</th>
                                        <th scope="row" class="col-md-1 text-primary">WhatsApp</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1;
                                    foreach ($Kntk as $k) : ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $no++; ?></th>
                                            <td class="align-middle"><?= @ucwords($k->fullname . ", " . $k->title) ?></td>
                                            <td class="align-middle">
                                                <?php if (empty($k->jabatan)) : ?><span class="text-danger">&mdash;</span>
                                                <?php else : echo @ucwords($k->jabatan);
                                                endif; ?>
                                            </td>
                                            <td class="align-middle"><?= @ucwords($k->nomorHp) ?></td>
                                            <td class="align-middle text-center">
                                                <span class="badge badge-success">
                                                    <a href="https://wa.me/<?= @ucwords($k->nomorHp) ?>" target="_blank"><i class="fab fa-whatsapp text-white"></i>&nbsp;</a>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <hr class="mt-4">
                            <div class="card-footer my-0 py-0">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-sm justify-content-end">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
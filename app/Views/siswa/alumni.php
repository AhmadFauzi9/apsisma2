<?= $this->extend('templates/index') ?>

<!-- ALUMNI ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('alumni'); ?>
<section class="section">
    <div class="card">
        <div class="card-header mt-1">
            <h4 class="text-primary">
                <i class="fa fa-trophy text-primary" style="font-size: 25px;"></i>
                &nbsp;Alumni Tahun 2021
            </h4>
            <a data-collapse="#prestasi2022" class="btn btn-info px-2 py-0" href="#"><i class="fas fa-minus"></i></a>
        </div>

        <div class="collapse show" id="prestasi2022">
            <div class="card-body">
                <!-- TABEL -->
                <div class="table-responsive" id="mycard-collapse">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="row" class="col-1 text-center text-primary">No</th>
                                <th scope="row" class="col-3 text-primary">Nama</th>
                                <th scope="row" class="col-1 text-primary">Kelas</th>
                                <th scope="row" class="col-1 text-primary">L/P</th>
                                <th scope="row" class="col-6 text-primary">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center align-middle">1</th>
                                <td class="align-middle">Moh Toha</td>
                                <td class="align-middle">IX A</td>
                                <td class="align-middle">L</td>
                                <td class="align-middle">Blokagung, Karangdoro, Tegalsari, Banyuwangi</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center align-middle">2</th>
                                <td class="align-middle">Moh Toha2</td>
                                <td class="align-middle">VIII A</td>
                                <td class="align-middle">L</td>
                                <td class="align-middle">Blokagung, Karangdoro, Tegalsari, Banyuwangi</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center align-middle">3</th>
                                <td class="align-middle">Moh Toha3</td>
                                <td class="align-middle">VIII A</td>
                                <td class="align-middle">L</td>
                                <td class="align-middle">Blokagung, Karangdoro, Tegalsari, Banyuwangi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="card-footer">
                Card Footer
            </div> -->
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
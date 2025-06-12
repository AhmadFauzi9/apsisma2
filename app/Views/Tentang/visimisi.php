<?= $this->extend('templates/index') ?>

<!-- VISI MISI ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('visimisi'); ?>
<section class="section">
    <div class="card card-info mt-1 mb-4">
        <div class="card-header mt-1">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-10 px-0">
                        <h4 class="text-info">
                            <i class="fa fa-bookmark text-info" style="font-size: 25px;"></i>
                            &nbsp;Visi
                        </h4>
                    </div>
                    <div class="col-2 px-0 text-right">
                        <!-- Button trigger modal -->
                        <button method="post" type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse show" id="profilMTsA">
            <div class="card-body">
                <p class="mb-1">
                    <?php if (isset($_POST['simpan'])) {
                        echo $visi = $_POST['visi'];
                    } ?>
                </p>
            </div>
        </div>
    </div>

    <div class="card card-warning mt-0">
        <div class="card-header">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-10 px-0">
                        <h4 class="text-warning">
                            <i class="fa fa-puzzle-piece text-warning" style="font-size: 25px;"></i>
                            &nbsp;Misi
                        </h4>
                    </div>
                    <div class="col-2 px-0 text-right">
                        <button type="button" class="btn btn-primary" method="post">Edit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse show" id="profilMTsA">
            <div class="card-body">
                <div class="mb-1">
                    <ul class="pl-3">
                        <li>Membekali pengetahuan agama islam yang kuat.</li>
                        <li>Meningkatkan kesadaran diri siswa atas tugas dan kewajiban beribadah</li>
                        <li>Meningkatkan kualitas tingkat kelulusan</li>
                        <li>Mengenalkan dan membekali siswa dengan ketrampilan kecakapan hidup</li>
                        <li>Mengamalkan dan melaksanakan budaya ahlakul karimah dalam kehidupan sehari-hari</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal HARUS DILUAR TAH <section></section> -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel">Visi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url(); ?>/home/visimisi">
                <div class="modal-body mb-0 pb-0">
                    <textarea name="visi" class="form-control" rows="30" style="min-height: 100px;"><?= @$_POST['visi']; ?></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
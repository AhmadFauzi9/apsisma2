<!-- Modal Harus Login Dulu -->
<div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Yakin?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>

            <div class="modal-body">
                <p>
                    Yakin mau menghapus user ini?
                </p>
            </div>

            <div class="modal-footer mb-0 bg-white">
                <form action="<?= base_url() ?>/siswa/detail/<?= $dataStudent->username ?>" method="POST" class="d-inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-sm btn-icon pr-1 btn-info"><i class="far fa-eye text-white"></i>&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
</div>
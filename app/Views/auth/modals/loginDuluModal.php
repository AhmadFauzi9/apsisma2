<!-- Modal Harus Login Dulu -->
<div class="modal fade" id="loginDulu" tabindex="-1" aria-labelledby="loginDuluLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">Upps!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>

            <div class="modal-body">
                <?php if (@session($loginDulu)) : ?>
                    <?= session()->description; ?>
                <?php endif; ?>
            </div>

            <!-- <div class="modal-footer mb-0 bg-white text-muted text-small">
                Apsisma <div class="bullet"></div> <?= date('Y') ?>
            </div> -->
        </div>
    </div>
</div>
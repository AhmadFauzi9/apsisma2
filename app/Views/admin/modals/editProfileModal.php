<!-- Modal Form Login-->
<div class="modal fade" id="editProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Edit Biodata Diri</h5>
                <button type="button" class="close pt-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-2 mx-2">
                <div class="text-center">

                    <?php

                    use Kint\Zval\Value;

                    if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                <span>×</span>
                            </button>
                            <div class="text-small text-left">
                                <?= @session()->error['usernameAlert']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url() ?>/admin/profile/<?= ($dataAdmin->username) ?>">
                        <?php $validationAdmin = \Config\Services::validation(); ?>
                        <?= csrf_field(); ?>

                        <div class="row mb-3 mt-3 py-0">
                            <div class="form-group my-0 pr-1 col">
                                <input name="username1" id="username" type="text" placeholder="Username" value="<?= $dataAdmin->username ?>" class="form-control rounded-pill <?= ($validationAdmin->hasError('username1')) ? 'is-invalid' : null ?>" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= ($validationAdmin->getError('name1')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3 py-0">
                            <div class="form-group my-0 pr-1 col">
                                <input name="name1" id="name" type="text" placeholder="Nama Lengkap" value="<?= $dataAdmin->username ?>" class="form-control rounded-pill <?= ($validationAdmin->hasError('name1')) ? 'is-invalid' : null ?>" autofocus>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= ($validationAdmin->getError('name1')) ?>
                                </div>
                            </div>
                        </div>


                        <hr class="pb-2 mt-4">
                        <div class="form-group my-3">
                            <button type="submit" class="btn btn-primary btn-block btn-lg rounded-pill" tabindex="4">
                                <i class="fas fa-save"></i>
                                &ensp;Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
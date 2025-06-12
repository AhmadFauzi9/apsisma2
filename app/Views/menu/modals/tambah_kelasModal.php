<!-- Modal Form Login-->
<div class="modal fade" id="tambahKelas" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Kelas</h5>
                <button type="button" class="close pt-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-2 mx-2">
                <div class="text-center">

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                                <span>×</span>
                            </button>
                            <div class="text-small text-left">
                                <?= @session()->error['usernameAlert']; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url() ?>/kelasbagian/tambah_kelas/">
                        <?php $validation = \Config\Services::validation(); ?>
                        <?= csrf_field() ?>

                        <div class="row mb-3 mt-3 py-0">
                            <div class="form-group my-0 pr-1 col">
                                <select name="kelas" class="custom-select rounded-pill <?= ($validation->hasError('kelas')) ? 'is-invalid' : null ?>">
                                    <option selected disabled>Kelas</option>
                                    <option value="VII">7</option>
                                    <option value="VIII">8</option>
                                    <option value="IX">9</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= ($validation->getError('kelas')) ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-4">
                                <select name="bagian" class="custom-select rounded-pill <?= ($validation->hasError('bagian')) ? 'is-invalid' : null ?>">
                                    <option selected disabled>Bagian</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="J">J</option>
                                    <option value="K">K</option>
                                    <option value="L">L</option>
                                    <option value="M">M</option>
                                    <option value="N">N</option>
                                    <option value="O">O</option>
                                    <option value="P">P</option>
                                    <option value="Q">Q</option>
                                    <option value="R">R</option>
                                    <option value="S">S</option>
                                    <option value="T">T</option>
                                    <option value="U">U</option>
                                    <option value="V">V</option>
                                    <option value="W">W</option>
                                    <option value="X">X</option>
                                    <option value="Y">Y</option>
                                    <option value="Z">Z</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= ($validation->getError('bagian')) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-left ml-1 mb-3">
                            <label class="d-block text-left">Golongan Jenis Kelamin</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="gender" value="laki-laki" class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : null ?>" type="radio" id="cowok">
                                        <label class="form-check-label" for="cowok">Laki-laki</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="gender" value="perempuan" class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : null ?>" type="radio" id="cewek">
                                        <label class="form-check-label" for="cewek">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <input type="text" name="wali_kelas" value="<?= old("wali_kelas") ?>" class="form-control rounded-pill <?= ($validation->hasError('wali_kelas')) ? 'is-invalid' : null ?>" placeholder="Wali Kelas" autofocus>
                            <div class="invalid-feedback text-left ml-3">
                                <?= ($validation->getError('wali_kelas')) ?>
                            </div>
                        </div>

                        <div class="form-group mb-2 mt-0 pt-0">
                            <input type="text" name="nomorHp" value="<?= old("nomorHp") ?>" class="form-control rounded-pill <?= ($validation->hasError('nomorHp')) ? 'is-invalid' : null ?>" placeholder="Nomor Telp/WA" autofocus>
                            <div class="invalid-feedback text-left ml-3">
                                <?= ($validation->getError('nomorHp')) ?>
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
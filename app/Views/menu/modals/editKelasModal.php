<!-- Modal Form Login-->
<div class="modal fade" id="editKelas" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Edit Kelas</h5>
                <button type="button" class="close pt-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2 mx-2">
                <div class="text-center">
                    <form method="post" action="<?= base_url() ?>/KelasBagian/edit_kelas/">
                        <?php $validation = \Config\Services::validation(); ?>
                        <?= csrf_field() ?>

                        <input type="hidden" name="id" id="id">
                        <div class="row mb-3 mt-3 py-0">
                            <div class="form-group my-0 pr-1 col">
                                <label class="d-block text-left ml-2">Kelas</label>
                                <select name="kelas" id="kelas" class="custom-select rounded-pill <?= ($validation->hasError('kelas')) ? 'is-invalid' : null ?>">
                                    <option selected disabled>Kelas</option>
                                    <option value="VII">Kelas 7</option>
                                    <option value="VIII">Kelas 8</option>
                                    <option value="IX">Kelas 9</option>
                                </select>
                                <div class="invalid-feedback text-left ml-3">
                                    <?= ($validation->getError('kelas')) ?>
                                </div>
                            </div>
                            <div class="form-group my-0 pl-1 col-4">
                                <label class="d-block text-left ml-2">Bagian</label>
                                <select name="bagian" id="bagian" class="custom-select rounded-pill <?= ($validation->hasError('bagian')) ? 'is-invalid' : null ?>">
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
                                        <input name="gender" value="laki-laki" class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : null ?>" type="radio" id="editcowok">
                                        <label class="form-check-label" for="editcowok">Laki-laki</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="gender" value="perempuan" class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : null ?>" type="radio" id="editcewek">
                                        <label class="form-check-label" for="editcewek">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <label class="d-block text-left ml-2">Wali Kelas</label>
                            <input type="text" name="wali_kelas" id="wali_kelas" class="form-control rounded-pill <?= ($validation->hasError('wali_kelas')) ? 'is-invalid' : null ?>" placeholder="Wali Kelas">
                            <div class="invalid-feedback text-left ml-3">
                                <?= ($validation->getError('wali_kelas')) ?>
                            </div>
                        </div>
                        <div class="form-group mb-2 mt-0 pt-0">
                            <label class="d-block text-left ml-2">Nomor Hp</label>
                            <input type="text" name="nomorHp" id="nomorHp" class="form-control rounded-pill <?= ($validation->hasError('nomorHp')) ? 'is-invalid' : null ?>" placeholder="Nomor Telp/WA">
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
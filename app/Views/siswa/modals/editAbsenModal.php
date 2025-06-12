<!-- Modal Form Login-->
<div class="modal fade" id="editAbsen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editAbsenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Edit Absen</h5>
                <button type="button" class="close pt-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-2 mx-2">

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

                <form method="post" action="<?= base_url(); ?>/absensi/editAbsen/">
                    <?php $validationAbsen = \Config\Services::validation(); ?>
                    <?php csrf_field() ?>

                    <!-- <i class="fas fa-exclamation-triangle"></i> -->
                    <div class="col mx-0 px-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm">
                                <!-- Table Header -->
                                <tr>
                                    <th colspan="2" class="bg-white align-middle" style="border: 0;">
                                        KELAS <?= @(strtoupper($dataAbsensi[0]->kelas) . " " . strtoupper($dataAbsensi[0]->bagian)) ?>
                                        &nbsp;|&nbsp; TANGGAL, <?= date('d-m-Y', strtotime($dataAbsensi[0]->tanggal)) ?>
                                    </th>
                                </tr>
                                <tr class="" style="border-top: solid 2px #6777ef;">
                                    <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">No</th>
                                    <th rowspan="2" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Nama Lengkap</th>
                                    <th rowspan="2" class="col-1 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Kelas</th>
                                    <th colspan="4" class="col-4 text-center align-middle text-primary" style="border: 1px solid rgba(0, 0, 0, 0.1);">Absen</th>
                                </tr>
                                <tr class="">
                                    <th scope="row" class="col-1 text-center text-danger" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>A</strong></th>
                                    <th scope="row" class="col-1 text-center text-warning" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>S</strong></th>
                                    <th scope="row" class="col-1 text-center text-info" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>I</strong></th>
                                    <th scope="row" class="col-1 text-center text-secondary" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><strong>T</strong></th>
                                    <th scope="row" class="col-1 text-center text-success" style="border: 1px solid rgba(0, 0, 0, 0.1) ;"><i class="fas fa-check"></i></th>
                                </tr>
                                <!-- End of Table Header -->

                                <!-- radio box -->
                                <?php $no   = 1;
                                $no_user    = 1;
                                $no_name    = 1;
                                $no_kelas   = 1;
                                $no_bagian  = 1;
                                $idAlpa1    = 1;
                                $forAlpa1   = 1;
                                $idSakit1   = 1;
                                $forSakit1  = 1;
                                $idIzin1    = 1;
                                $forIzin1   = 1;
                                $idMasuk1   = 1;
                                $forMasuk1  = 1;
                                $idTelat1   = 1;
                                $forTelat1  = 1;
                                $nameAlpa1  = 1;
                                $nameSakit1 = 1;
                                $nameIzin1  = 1;
                                $nameMasuk1 = 1;
                                $nameTelat1 = 1;
                                $i          = 1;
                                foreach ($dataAbsensi as $dataAbsen) : ?>

                                    <input type="hidden" name="id<?= $i++ ?>" value="<?= @$dataAbsen->id ?>">
                                    <input type="hidden" name="tanggal" value="<?= @$dataAbsen->tanggal ?>">

                                    <tr>
                                        <th class="text-center"><?= $no++; ?></th>
                                        <td class="align-middle"><?= @ucwords($dataAbsen->fullname); ?></td>
                                        <td class="align-middle text-center">
                                            <?php
                                            if ($dataAbsen->kelas == "vii") : echo 7 . "-" . strtoupper($dataAbsen->bagian);
                                            elseif ($dataAbsen->kelas == "viii") : echo 8 . "-" . strtoupper($dataAbsen->bagian);
                                            elseif ($dataAbsen->kelas == "ix") : echo 9 . "-" . strtoupper($dataAbsen->bagian);
                                            endif; ?>
                                        </td>
                                        <td class="pl-2 pr-0 text-center align-middle bg-danger">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="alpa<?= $idAlpa1++; ?>" value="alpa" <?php if ($dataAbsen->absen == "alpa") : ?> checked <?php else : null;
                                                                                                                                                                endif; ?> name="<?= 'absen' . $nameAlpa1++; ?>" class="custom-control-input">
                                                <label class="custom-control-label" for="alpa<?= $forAlpa1++; ?>"></label>
                                            </div>
                                        </td>
                                        <td class="pl-2 pr-0 text-center align-middle bg-warning">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="sakit<?= $idSakit1++; ?>" value="sakit" <?php if ($dataAbsen->absen == "sakit") : ?> checked <?php else : null;
                                                                                                                                                                    endif; ?> name="<?= 'absen' . $nameSakit1++; ?>" class="custom-control-input">
                                                <label class="custom-control-label" for="sakit<?= $forSakit1++; ?>"></label>
                                            </div>
                                        </td>
                                        <td class="pl-2 pr-0 text-center align-middle bg-info">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="izin<?= $idIzin1++; ?>" value="izin" <?php if ($dataAbsen->absen == "izin") : ?> checked <?php else : null;
                                                                                                                                                                endif; ?> name="<?= 'absen' . $nameIzin1++; ?>" class="custom-control-input">
                                                <label class="custom-control-label" for="izin<?= $forIzin1++; ?>"></label>
                                            </div>
                                        </td>
                                        <td class="pl-2 pr-0 text-center align-middle bg-secondary">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="telat<?= $idTelat1++; ?>" value="terlambat" <?php if ($dataAbsen->absen == "telat") : ?> checked <?php else : null;
                                                                                                                                                                        endif; ?> name="<?= 'absen' . $nameTelat1++; ?>" class="custom-control-input">
                                                <label class="custom-control-label" for="telat<?= $forTelat1++; ?>"></label>
                                            </div>
                                        </td>
                                        <td class="pl-2 pr-0 text-center align-middle bg-success">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="masuk<?= $idMasuk1++; ?>" value="masuk" <?php if ($dataAbsen->absen == "masuk") : ?> checked <?php else : null;
                                                                                                                                                                    endif; ?> name="<?= 'absen' . $nameMasuk1++; ?>" class="custom-control-input">
                                                <label class="custom-control-label" for="masuk<?= $forMasuk1++; ?>"></label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- radio Box -->
                            </table>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <div class="col-6 text-right">
                                <button type="submit" class="btn btn-primary rounded-pill"><i class="fas fa-save">&nbsp;</i> Simpan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
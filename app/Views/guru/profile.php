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
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/guru/userGuru/">Users Guru</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/guru/detail/<?= $dataTeachers->username ?>">Detail Guru</a></div>
            </ol>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('profile-guru'); ?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<!-- MODAL EDIT PROFILE ---------------------------------------------------------------------------------------------------------- -->
<?= $this->include('guru/modals/editProfileModal') ?>
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
                    <div class="col-2 col-md-auto">
                        <div class="card-header text-right px-0 pt-3 mx-0">
                            <a href="#" class="btn btn-warning py-0" data-toggle="modal" data-target="#editProfile">Edit</a>
                            <!-- spasi (&ensp;) -->
                        </div>
                    </div>
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
                            <div class="pb- pt-1 px-0 px-0"><strong>Username</strong></div>
                        </div>

                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= ucwords($dataTeachers->username) ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: #fff;">
                        <div class="col">
                            <div class="pb- pt-1 px-0"><strong>Nama Lengkap</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= ($dataTeachers->fullname) ? (@ucwords($dataTeachers->fullname) . ", " . ($dataTeachers->title)) : '<span class="text-danger text-small">Kosong</span>'; ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                        <div class="col">
                            <div class="pb- pt-1 px-0"><strong>Jenis Kelamin</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= ($dataTeachers->gender) ? @ucwords($dataTeachers->gender) :  '<span class="text-danger text-small">Kosong</span>'; ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: #fff;">
                        <div class="col">
                            <div class="pb- pt-1 px-0"><strong>TTL</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?php
                                if ($dataTeachers->tempatLahir) :
                                    $namahari = @date('l', @strtotime($dataTeachers->tanggalLahir));
                                    $split    = @explode('-', @$dataTeachers->tanggalLahir);
                                    echo (@ucwords($dataTeachers->tempatLahir) . ", " . @$split[2] . ' ' . @$bulan[(int)$split[1]] . ' ' . @$split[0] . ". " . "( Hari $hari[$namahari] )");
                                else : '<span class="text-danger text-small">Kosong</span>';
                                endif; ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                        <div class="col">
                            <div class="pb- pt-1 px-0"><strong>NIP / NIPY</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= (@$dataTeachers->nip) ? (@$dataTeachers->nip) . " / " . (@$dataTeachers->nipy) : '<span class="text-danger text-small">Kosong</span>' ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: #fff;">
                        <div class="col">
                            <div class="pb- pt-1 px-0"><strong>Jabatan</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= ($dataTeachers->jabatan) ? @ucwords($dataTeachers->jabatan) : '<span class="text-danger text-small">Kosong</span>' ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: rgba(0, 0, 0, 0.02);">
                        <div class="col">
                            <div class="pb- pt-1 px-0"><strong>Nomor Hp</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?= ($dataTeachers->nomorHp) ? @ucwords($dataTeachers->nomorHp) : '<span class="text-danger text-small">Kosong</span>' ?>
                            </p>
                        </div>
                    </div>

                    <div class="row px-0 mx-0" style="background-color: #fff;">
                        <div class="col">
                            <div class="pb- pt-1 px-0"><strong>Alamat</strong></div>
                        </div>
                        <div class="col-lg-9 col-md-auto">
                            <p class="align-middle pb-0">
                                <?php if ($dataTeachers->dusun != '') {
                                    echo @ucwords($dataTeachers->dusun) . ", " . @ucwords($dataTeachers->desa) . ", " . @ucwords($dataTeachers->kecamatan) . ", " . @ucwords($dataTeachers->kabupaten) . ", " . @ucwords($dataTeachers->provinsi) . ", " . @ucwords($dataTeachers->kodePos);
                                } elseif (($dataTeachers->dusun == '' && $dataTeachers->dusun != '')) {
                                    echo @ucwords($dataTeachers->desa . ", " . $dataTeachers->kecamatan . ", " . $dataTeachers->kabupaten . ", " . $dataTeachers->provinsi . ", " . $dataTeachers->kodePos);
                                } else {
                                    echo '<span class="text-danger text-small">Kosong</span>';
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="<?= base_url(); ?>/templates/node_modules/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id_provinsi = $('#provinsi').val();
            var action = 'get_kabupaten';
            if (id_provinsi != '') {
                $.ajax({
                    url: '<?= site_url('wilayah_Indonesia/getKabupaten') ?>',
                    method: 'POST',
                    data: {
                        'id_provinsi': id_provinsi,
                        'action': action
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '<option value="">Pilih Kabupaten</option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count]['id'] + '">' + data[count]['nama'] + '</option>'
                        }
                        $('#kabupaten').html(html);
                    }
                })
            } else {
                $('#kabupaten').val('');
            }
            $('#kecamatan').val('');
        })

        $('#kabupaten').change(function() {
            var id_kabupaten = $('#kabupaten').val();
            var action = 'get_kecamatan';
            if (id_kabupaten != '') {
                $.ajax({
                    url: '<?= site_url('wilayah_Indonesia/getKecamatan') ?>',
                    method: 'POST',
                    data: {
                        'id_kabupaten': id_kabupaten,
                        'action': action
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '<option value="">Pilih Kecamatan</option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count]['id'] + '">' + data[count]['nama'] + '</option>'
                        }
                        $('#kecamatan').html(html);
                    }
                })
            } else {
                $('#kecamatan').val('');
            }
        })

        $('#kecamatan').change(function() {
            var id_kecamatan = $('#kecamatan').val();
            var action = 'get_desa';
            if (id_kecamatan != '') {
                $.ajax({
                    url: '<?= site_url('wilayah_Indonesia/getDesa') ?>',
                    method: 'POST',
                    data: {
                        'id_kecamatan': id_kecamatan,
                        'action': action
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '<option value="">Pilih Desa</option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count]['id'] + '">' + data[count]['nama'] + '</option>'
                        }
                        $('#desa').html(html);
                    }
                })
            } else {
                $('#desa').val('');
            }
        })
    })
</script>
<?= $this->endSection(); ?>s
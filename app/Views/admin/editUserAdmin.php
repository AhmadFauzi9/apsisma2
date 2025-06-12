<?= $this->extend('templates/index') ?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<!-- Breadcrumb -->
<?= $this->section('breadcrumb'); ?>
<section class="section">
  <div class="section-header">
    <h1>Users Siswa</h1>
    <div class="section-header-breadcrumb">
      <ol class="breadcrumb bg-transparent px-0 my-0 py-0">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/menu/">Dashboard</a></li>
        <div class="breadcrumb-item"><a href="<?= base_url() ?>/siswa/userSiswa/">Users Admin</a></div>
      </ol>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<!-- KONTAK GURU ---------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?= $this->section('userAdmin'); ?>

<!-- MODAL EDIT PROFILE ---------------------------------------------------------------------------------------------------------- -->
<!-- = $this->include('admin/modals/editProfileModal') ?> -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<section class="section">
  <div class="row mx-0 px-0">
    <div class="col px-0 mx-0">
      <h2 class="section-title mt-0 pt-2"><?= $judul ?></h2>
      <p class="section-lead">Username, nama lengkap, dan detail admin</p>
    </div>
    <div class="col px-0 mx-0">
      <form action="<?= base_url() ?>/admin/userAdmin/" method="POST">
        <div class="input-group mb-3 pt-1">
          <input name="keyword_siswa" class="form-control" type="Search" placeholder="Cari..." aria-label="Search" data-width="250" style="border-radius: 20px 0 0 20px;">
          <div class="input-group-append">
            <button class="btn btn-primary btn-icon px-4" type="submit" style="border-radius: 0 20px 20px 0;"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card card-statistic-1">
        <!-- JUDUL -->
        <div class="row card-body pl-0 mr-4 ml-2">
          <div class="col">
            <div class="card-header px-0 mx-0">
              <h5 class="text-primary">
                <i class="fas fa-phone-square text-primary" style="font-size: 20px;"></i>
                &nbsp;List Admin
              </h5>
            </div>
          </div>
        </div>

        <!-- TABEL SPP -->
        <div class="row mx-1">
          <div class="col mt-2">
            <table class="table table-responsive table-striped table-bordered table-md">
              <thead>
                <tr>
                  <th class="col-1 align-middle text-center text-primary">No</th>
                  <th class="col-3 align-middle text-primary">Username</th>
                  <th class="col align-middle text-primary">Nama Lengkap</th>
                  <!-- <th class="col-2 align-middle text-primary">No Telp</th> -->
                  <th class="col-3 align-middle text-primary aksi">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($dataAdmins as $dataAdmin) : ?>
                  <tr>
                    <th class="align-middle text-center"><?= $no++; ?></th>
                    <td class="align-middle"><?= @ucwords($dataAdmin->username) ?></td>
                    <td class="align-middle"><?= @ucwords($dataAdmin->name) ?></td>
                    <td class="align-middle">
                      <!-- Lihat -->
                      <form action="<?= base_url() ?>/admin/detail/<?= ($dataAdmin->username) ?>" method="POST" class="d-inline">
                        <?= csrf_field() ?>
                        <!-- <button type="submit" class="btn btn-sm btn-info pr-2"><i class="far fa-eye text-white"></i> </button> -->
                        <a href="#" class="btn btn-sm btn-info pr-2" data-toggle="modal" data-target="#editProfile"><i class="fa fa-pen text-white"></i></a>
                      </form>
                      <!-- Delete -->
                      <a href="#" data-toggle="modal" data-target="#confirmDelete" class="btn btn-sm btn-danger" title="Delete"><i class="far fa-trash-alt text-white"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer my-0 py-0">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Harus Login Dulu -->
<div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>

      <div class="modal-body mb-0">
        <span>
          Yakin mau menghapus user ini?
        </span>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-2">Nggak jadi</button>
        <form action="<?= base_url() ?>/admin/delete/<?= ($dataAdmin->username) ?>" method="POST" class="d-inline">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-primary">Yakin dong</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
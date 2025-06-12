<!-- MODAL FORM LOGIN --------------------------------- -->
<?= $this->include('auth/modals/formRegisterModal') ?>
<!-- -------------------------------------------------- -->
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url(); ?> ">APSISMA <sup>MTsA</sup></a>
        </div>

        <!-- Alert -->
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button class="close" data-dismiss="alert" style="margin-top: -2px;">
                    <span>×</span>
                </button>
                <div class="text-small text-left">
                    <?= @session()->success['loginSukses']; ?>
                    <?= @session()->success['registerSukses']; ?>
                </div>
            </div>
        <?php endif; ?>

        <ul class="sidebar-menu">
            <!-- Menu Dashboard -->
            <li class="menu-header">Dashboard</li>
            <li class="nav-item py-0">
                <a href="<?= base_url(); ?>/menu" class="nav-link py-0"><i class="fas fa-tachometer-alt"></i><span>Menu</span></a>
            </li>

            <!-- Menu Admin-->
            <?php if (session()->levelId == 1) : ?>
                <li class="nav-item py-0 dropdown">
                    <a href="#" class="nav-link py-0 has-dropdown"><i class="fas fa-users"></i><span> Daftar Users</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/admin/userAdmin">Daftar User Admin</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/guru/userGuru">Daftar User Guru</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <li class="menu-header">
                <hr class="my-0">
            </li>

            <?php if ((session()->levelId == 1) || (session()->levelId == 2)) : ?>
                <li class="menu-header">List Kelas</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span> Daftar Kelas VII</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-A</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-B</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-C</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-D</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-E</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-F</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-G</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-H</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-I</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-J</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-K</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-L</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-M</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 7-N</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span> Daftar Kelas VIII</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-A</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-B</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-C</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-D</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-E</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-F</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-G</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-H</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-I</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-J</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-K</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 8-L</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span> Daftar Kelas IX</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-A</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-B</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-C</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-D</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-E</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-F</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-G</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-H</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-I</a></li>
                        <li><a class="nav-link py-0" href="<?= base_url(); ?>/siswa/userSiswa">Kelas 9-J</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr class="my-0">
                </li>
            <?php endif; ?>

            <!-- Menu E-RIWAYAT -->
            <li class="menu-header">Data</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-history"></i><span> E-Riwayat</span></a>
                <ul class="dropdown-menu">
                    <?php if (session()->logged_in) : ?>
                        <li><a class="nav-link" href="<?= base_url(); ?>/home/riwayatKelas">Riwayat Kelas</a></li>
                        <li><a class="nav-link" href="<?= base_url(); ?>/home/riwayatKesehatan">Riwayat Kesehatan</a></li>
                        <li><a class="nav-link" href="<?= base_url(); ?>/home/riwayatAsrama">Riwayat Asrama</a></li>
                    <?php else : ?>
                        <li><a class="nav-link" href="#" data-toggle="modal" data-target="#loginDulu">Riwayat Kelas</a></li>
                        <li><a class="nav-link" href="#" data-toggle="modal" data-target="#loginDulu">Riwayat Kesehatan</a></li>
                        <li><a class="nav-link" href="#" data-toggle="modal" data-target="#loginDulu">Riwayat Asrama</a></li>
                    <?php endif; ?>
                </ul>
            </li>

            <!-- Menu E-ALUMNI -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>E-Alumni</span></a>
                <ul class="dropdown-menu">
                    <?php if (session()->logged_in) : ?>
                        <li><a class="nav-link" href="<?= base_url(); ?>/home/alumni">Tahun 2021</a></li>
                        <li><a class="nav-link" href="<?= base_url(); ?>/home/alumni">Tahun 2020</a></li>
                        <li><a class="nav-link" href="<?= base_url(); ?>/home/alumni">Tahun 2019</a></li>
                    <?php else : ?>
                        <li><a class="nav-link" href="#" data-toggle="modal" data-target="#loginDulu">Tahun 2021</a></li>
                        <li><a class="nav-link" href="#" data-toggle="modal" data-target="#loginDulu">Tahun 2020</a></li>
                        <li><a class="nav-link" href="#" data-toggle="modal" data-target="#loginDulu">Tahun 2019</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="menu-header">
                <hr class="my-0">
            </li>

            <!-- Menu Medsos -->
            <li class="menu-header">Media Sosial</li>
            <li class="nav-item"><a href="https://mtsalamiriyyah.sch.id" class="nav-link" target="_blank"><i class="fas fa-globe"></i><span>Website</span></a></li>
            <li class="nav-item"><a href="http://bit.ly/youtubemtsalamiriyyah" class="nav-link" target="_blank"><i class="fab fa-youtube"></i><span>Youtube</span></a></li>
            <li class="nav-item"><a href="https://www.instagram.com/mts.alamiriyyah" class="nav-link" target="_blank"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
            <li class="nav-item"><a href="https://www.facebook.com/mts.blokagung" class="nav-link" target="_blank"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
        </ul>
        <!-- End of Medsos -->

        <!-- Tombol Galery dan Register -->
        <?php if (session()->levelId == 1) : ?>
            <div class="my-2 p-3 hide-sidebar-mini text-left">
                <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split" data-toggle="modal" data-target="#formLogin"><i class="fas fa-user-plus"></i>Create an Account</a>
            </div>
        <?php elseif (session()->levelId == 2) : ?>
            <div class="my-2 p-3 hide-sidebar-mini text-left">
                <a href="<?= base_url(); ?>/home/galery" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="far fa-image"></i><span style="margin-left: -40px;">Galery Guru</span></a>
            </div>
        <?php else : ?>
            <div class="my-2 p-3 hide-sidebar-mini text-left">
                <a href="<?= base_url(); ?>/home/galery" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="far fa-image"></i><span style="margin-left: -40px;">Galery Siswa</span></a>
            </div>
        <?php endif; ?>
    </aside>
</div>
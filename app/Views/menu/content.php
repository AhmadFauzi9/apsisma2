<div class="main-content my-0">
    <!-- MODAL HARUS LOGIN -->
    <?= $this->include('auth/modals/loginDuluModal'); ?>

    <section class="section">
        <div class="shadow-sm card-body bg-white rounded mt-0 mb-3 pt-3 pb-0">
            <?php if (!session()->logged_in) : ?>
                <!-- TOMBOL MENU UTAMA SISWA Jika BELUM Login-->
                <div class="row">
                    <div class="col mb-0 mt-1 px-3 text-center">
                        <label for="Absensi">
                            <a href="#" id="Absensi" class="text-primary" data-toggle="modal" data-target="#loginDulu">
                                <i class="fa fa-address-book fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                            </a>
                            <p class="small text-center text-primary" id="Absensi">Absensi</p>
                        </label>
                    </div>

                    <div class="col mx-0 mt-1 px-3 text-center">
                        <label for="Raport">
                            <a href="<?= base_url(); ?>/home/raport" id="Raport" class="text-primary" data-toggle="modal" data-target="#loginDulu">
                                <i class="fa fa-book fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                            </a>
                            <p class="small text-center text-primary" id="Raport">Raport</p>
                        </label>
                    </div>

                    <div class="col mx-0 px-3 text-center">
                        <label for="spp">
                            <a href="<?= base_url(); ?>/home/spp" id="spp" class="text-primary" data-toggle="modal" data-target="#loginDulu">
                                <i class="fa fa-credit-card fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                            </a>
                            <p class="small text-center text-primary" id="spp">Pembayaran</p>
                        </label>
                    </div>

                    <div class="col mx-0 px-3 text-center">
                        <label for="konsul">
                            <a href="<?= base_url(); ?>/home/konsul" id="konsul" class="text-primary" data-toggle="modal" data-target="#loginDulu">
                                <i class="fa fa-comments fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                            </a>
                            <p class="small text-center text-primary" id="konsul">Konsul</p>
                        </label>
                    </div>
                </div>
            <?php elseif (session()->logged_in) : ?>

                <!-- TOMBOL MENU UTAMA SISWA Jika SUDAH Login-->
                <div class="row">

                    <div class="col mb-0 mt-1 px-3 text-center">
                        <label for="Absensi">
                            <?php if (session()->levelId == 3) : ?>
                                <a href="<?= base_url(); ?>/absensi/hasilAbsen/<?= session()->username; ?>" id="Absensi" class="text-primary">
                                    <i class="fa fa-address-book fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                                </a>
                            <?php elseif (session()->levelId == 1 || session()->levelId == 2) : ?>
                                <a href="<?= base_url(); ?>/absensi/pilih_insertAbsen/" id="Absensi" class="text-primary">
                                    <i class="fa fa-address-book fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                            <p class="small text-center text-primary" id="Absensi">Absensi</p>
                        </label>
                    </div>

                    <div class="col mx-0 mt-1 px-3 text-center">
                        <label for="Raport">
                            <a href="<?= base_url(); ?>/home/raport" id="Raport" class="text-primary">
                                <i class="fa fa-book fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                            </a>
                            <p class="small text-center text-primary" id="Raport">Raport</p>
                        </label>
                    </div>
                    <div class="col mx-0 px-3 text-center">
                        <label for="spp">
                            <a href="<?= base_url(); ?>/home/spp" id="spp" class="text-primary">
                                <i class="fa fa-credit-card fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                            </a>
                            <p class="small text-center text-primary" id="spp">Pembayaran</p>
                        </label>
                    </div>
                    <div class="col mx-0 px-3 text-center">
                        <label for="konsul">
                            <a href="<?= base_url(); ?>/home/konsul" id="konsul" class="text-primary">
                                <i class="fa fa-comments fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                            </a>
                            <p class="small text-center text-primary" id="konsul">Konsul</p>
                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <!-- TOMBOL MENU UTAMA VIEW PUBLIC-->
            <div class="row">
                <div class="col mx-0 mt-1 px-3 text-center">
                    <label for="Prestasi">
                        <a href="<?= base_url(); ?>/home/prestasi" id="Prestasi" class="text-primary">
                            <i class="fa fa-trophy fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                        </a>
                        <p class="small text-center text-primary" id="Prestasi">Prestasi</p>
                    </label>
                </div>

                <div class="col mx-0 mt-1 px-3 text-center">
                    <label for="CBT">
                        <a href="" id="CBT" class="text-primary">
                            <i class="fa fa-desktop fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                        </a>
                        <p class="small text-center text-primary" id="CBT">CBT</p>
                    </label>
                </div>

                <div class="col mx-0 px-3 text-center">
                    <label for="pspdb">
                        <a href="<?= base_url(); ?>/pspdb" id="pspdb" class="text-primary">
                            <i class="fa fa-address-card fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                        </a>
                        <p class="small text-center text-primary" id="pspdb">PSPDB</p>
                    </label>
                </div>

                <div class="col mx-0 px-3 text-center">
                    <label for="kontak">
                        <a href="<?= base_url(); ?>/guru/kontak" id="kontak" class="text-primary">
                            <i class="fa fa-phone fa-2x my-1 mx-1" style="margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i>
                        </a>
                        <p class="small text-center text-primary" id="kontak">Kontak</p>
                    </label>
                </div>
            </div>
        </div>
    </section>

    <!-- TOMBOL TENTANG VIEW PUBLIC-->
    <section class="section">
        <div class="card-body rounded mt-3 mb-3 pb-0">
            <div class="row">
                <div class="col mx-0 px-3 text-center">
                    <label for="visimisi">
                        <a href="<?= base_url(); ?>/home/visimisi" id="visimisi" class="text-primary">
                            <!-- <i class="fa fa-bookmark my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/bookmark.png" class="mb-2" style="width: 33px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="visimisi" style="line-height: 15px;">Visi dan Misi</p>
                    </label>
                </div>
                <div class="col mx-0 px-3 text-center">
                    <label for="profil">
                        <a href="<?= base_url(); ?>/home/profil" id="profil" class="text-primary">
                            <!-- <i class="fa fa-graduation-cap my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/doc.png" class="mb-2" style="width: 33px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="profil" style="line-height: 15px;">Profil Sekolah</p>
                    </label>
                </div>
                <div class="col mx-0 px-3 text-center">
                    <label for="prokel">
                        <a href="<?= base_url(); ?>/home/prokel" id="prokel" class="text-primary">
                            <!-- <i class="fa fa-university my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/setting2.png" class="" style="width: 45px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="prokel" style="line-height: 15px;">Program Kelas</p>
                    </label>
                </div>
                <div class="col mx-0 px-3 text-center">
                    <label for="ekstra">
                        <a href="<?= base_url(); ?>/home/ekstra" id="ekstra" class="text-primary">
                            <!-- <i class="fa fa-futbol my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/ball.png" class="mb-2" style="width: 33px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="ekstra" style="line-height: 15px;">Ekstra Kulikuler</p>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col mx-0 px-3 text-center">
                    <label for="pkl">
                        <a href="<?= base_url(); ?>/home/pkl" id="pkl" class="text-primary">
                            <!-- <i class="fa fa-industry my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/kaca-pembesar.png" class="mb-2" style="width: 33px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="pkl" style="line-height: 15px;">Outing Class</p>
                    </label>
                </div>
                <div class="col mx-0 px-3 text-center">
                    <label for="karya">
                        <a href="<?= base_url(); ?>/home/karya" id="karya" class="text-primary">
                            <!-- <i class="fa fa-paint-brush my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/boneka.png" class="mb-2" style="width: 35px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="karya" style="line-height: 15px;">Karya Inovatif</p>
                    </label>
                </div>
                <div class="col mx-0 px-3 text-center">
                    <label for="event">
                        <a href="<?= base_url(); ?>/home/event" id="event" class="text-primary">
                            <!-- <i class="fa fa-star my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/star.png" class="mb-2" style="width: 33px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="event" style="line-height: 15px;">Special Event</p>
                    </label>
                </div>
                <div class="col mx-0 px-3 text-center">
                    <label for="fasilitas">
                        <a href="<?= base_url(); ?>/home/fasilitas" id="fasilitas" class="text-primary">
                            <!-- <i class="fa fa-building my-2 mx-1" style="font-size: 30px; margin-top:auto; margin-bottom:auto;" aria-hidden="true"></i> -->
                            <img src="<?= base_url(); ?>/templates/assets/img/icon/house.png" class="mb-2" style="width: 33px;" alt="">
                        </a>
                        <p class="small text-center text-dark pt-1" id="fasilitas" style="line-height: 15px;">Fasilitas Sekolah</p>
                    </label>
                </div>
            </div>
        </div>
    </section>
    <!-- End of TOMBOL TENTANG -->

    <!-- Carousel -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Pengumuman</h4>
                <div style="margin-left: auto;">
                    <a data-collapse="#mycard-collapse" class="btn btn-info px-2 py-0" href="#"><i class="fas fa-minus"></i></a>
                </div>
            </div>

            <div class="collapse show" id="mycard-collapse">
                <div class="card-body">
                    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators3" data-slide-to="0" class=""></li>
                            <li data-target="#carouselExampleIndicators3" data-slide-to="1" class=""></li>
                            <li data-target="#carouselExampleIndicators3" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url(); ?>/templates/assets/img/1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url(); ?>/templates/assets/img/2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?= base_url(); ?>/templates/assets/img/3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Carousel -->

    <!-- Keterangan APSISMA -->
    <section class="section">
        <div class="text-center mt-3 mb-0 py-0">
            <p class="h6">APSISMA &mdash; MTsA</p>
            <div class="col mb-0 py-0">
                <div class="blockquote-footer">
                    Nikmati cara mudah untuk mendapatkan informasi siswa-siswi MTs Al-Amiriyyah Darussalam Blokagung hanya via Smartphone
                </div>
            </div>
        </div>
    </section>
    <!-- End of Keterangan APSISMA -

</div>
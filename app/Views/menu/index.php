<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Apsisma &mdash; MTsA</title>

    <!-- General CSS Files -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/node_modules/summernote/dist/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/templates/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Topbar -->
            <?= $this->include('templates/topbar'); ?>
            <!-- End of Topbar -->

            <!-- Sidebar -->
            <?= $this->include('templates/sidebar'); ?>
            <!-- End of Sidebar -->

            <!-- Main-Content -->
            <?= $this->include('menu/content'); ?>
            <!-- End of Main-Content -->

            <!-- Footer -->
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; MTs Al-Amiriyyah <div class="bullet"></div> <?= date('Y') ?>
                </div>
                <div class="footer-right">
                    29.3.0
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>

    <!-- General JS Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
    <script src="<?= base_url(); ?>/templates/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url(); ?>/templates/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>/templates/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url(); ?>/templates/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="<?= base_url(); ?>/templates/assets/js/page/bootstrap-modal.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/templates/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/templates/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url(); ?>/templates/assets/js/page/index-0.js"></script>
</body>

</html>
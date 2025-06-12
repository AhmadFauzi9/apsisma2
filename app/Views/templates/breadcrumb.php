<?= $this->section('breadcrumb'); ?>
<section class="section">
    <div class="section-header">
        <h1>Breadcrumb</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/menu">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/home/absensi">Absensi</a></div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/home/raport">Absensi</a></div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
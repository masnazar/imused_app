<!doctype html>
<html lang="en">
<head>
    <?= $this->include('partials/title-meta') ?>
    <?= $this->include('partials/head-css') ?>
    <base href="<?= base_url() ?>">
</head>

<?= $this->include('partials/body') ?>

<div id="layout-wrapper">
    <?= $this->include('partials/menu') ?> <!-- Menggunakan menu yang sama dengan index.php -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?= $this->renderSection('content') ?> <!-- Konten dinamis -->
            </div>
        </div>

        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>
<?= $this->include('partials/vendor-scripts') ?>

<!-- Scripts -->
<!-- Tambahkan script yang diperlukan sesuai kebutuhan halaman -->
<script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>
</html>

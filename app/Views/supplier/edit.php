<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Supplier</h4>
                <p class="card-title-desc">Perbarui data supplier di bawah ini.</p>

                <!-- Tampilkan pesan kesalahan jika ada -->
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= implode('<br>', session()->getFlashdata('errors')) ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('supplier/update/' . $supplier['id']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT"> <!-- Method spoofing -->

                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= esc($supplier['nama_supplier']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_supplier" class="form-label">Kode Supplier</label>
                        <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="<?= esc($supplier['kode_supplier']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                        <textarea class="form-control" id="alamat_supplier" name="alamat_supplier"><?= esc($supplier['alamat_supplier']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pic_nama" class="form-label">PIC Nama</label>
                        <input type="text" class="form-control" id="pic_nama" name="pic_nama" value="<?= esc($supplier['pic_nama']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pic_email" class="form-label">PIC Email</label>
                        <input type="email" class="form-control" id="pic_email" name="pic_email" value="<?= esc($supplier['pic_email']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pic_telepon" class="form-label">PIC Telepon/WhatsApp</label>
                        <input type="text" class="form-control" id="pic_telepon" name="pic_telepon" value="<?= esc($supplier['pic_telepon']) ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Supplier</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
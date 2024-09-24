<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Supplier</h4>
                <p class="card-title-desc">Isi form di bawah untuk menambahkan supplier baru.</p>

                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('supplier/store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= old('nama_supplier') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_supplier" class="form-label">Kode Supplier</label>
                        <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="<?= old('kode_supplier') ?>" minlength="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                        <textarea class="form-control" id="alamat_supplier" name="alamat_supplier" rows="3"><?= old('alamat_supplier') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pic_nama" class="form-label">PIC Nama</label>
                        <input type="text" class="form-control" id="pic_nama" name="pic_nama" value="<?= old('pic_nama') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pic_email" class="form-label">PIC Email</label>
                        <input type="email" class="form-control" id="pic_email" name="pic_email" value="<?= old('pic_email') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pic_telepon" class="form-label">PIC Telepon/WhatsApp</label>
                        <input type="text" class="form-control" id="pic_telepon" name="pic_telepon" value="<?= old('pic_telepon') ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('supplier') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<!-- Optional: Jika ingin menambahkan custom scripts -->
<?= $this->section('scripts') ?>
    <script>
        // Custom script jika diperlukan
    </script>
<?= $this->endSection() ?>
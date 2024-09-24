<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Supplier</h4>
                <p class="card-title-desc">Berikut adalah daftar supplier yang tersedia.</p>

                <a href="<?= base_url('supplier/create') ?>" class="btn btn-primary mb-3">Tambah Supplier</a>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Kode Supplier</th>
                                <th>Alamat Supplier</th>
                                <th>PIC Nama</th>
                                <th>PIC Email</th>
                                <th>PIC Telepon/WhatsApp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($suppliers)) : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data supplier.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($suppliers as $key => $supplier) : ?>
                                    <tr>
                                        <td><?= $key + 1 + (10 * ($pager->getCurrentPage() - 1)) ?></td>
                                        <td><?= esc($supplier['nama_supplier']) ?></td>
                                        <td><?= esc($supplier['kode_supplier']) ?></td>
                                        <td><?= esc($supplier['alamat_supplier']) ?></td>
                                        <td><?= esc($supplier['pic_nama']) ?></td>
                                        <td><?= esc($supplier['pic_email']) ?></td>
                                        <td>
                                            <a href="https://wa.me/<?= preg_replace('/\D/', '', esc($supplier['pic_telepon'])) ?>" target="_blank">
                                                <?= esc($supplier['pic_telepon']) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('supplier/edit/' . $supplier['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="<?= base_url('supplier/delete/' . $supplier['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus supplier ini?');">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="mt-3">
                    <?= $pager->links() ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th class='text-center'>No.</th>
                <th class='text-center'>Paket</th>
                <th class='text-center'>Nama Pemesan</th>
                <th class='text-center'>Email Pemesan</th>
                <th class='text-center'>Status</th>
                <th class='text-center'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (!empty($getAllPesanan)):
                foreach ($getAllPesanan as $row):
            ?>
                    <tr>
                        <td class='text-center'><?= $no++; ?></td>
                        <td class='text-center'>
                            <a href="<?= base_url('assets/files/katalog/') . $row->image; ?>" target='_blank'>
                                <img src="<?= base_url('assets/files/katalog/') . $row->image; ?>" class="img-fluid" style="border-radius:10%;width:60px;height:60px;" alt="gambar">
                            </a>
                        </td>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->status; ?></td>
                        <td><?php if ($row->status == 'approved'): ?>
                                <a href="#" class="btn btn-sm btn-secondary disabled" title="Pesanan Sudah Diterima" disabled>Terima</a>
                                <a href="#" class="btn btn-sm btn-secondary disabled" title="Pesanan Sudah Diterima" disabled>Tolak</a>
                            <?php else: ?>
                                <a href="<?= base_url('admin-terima-pesanan/') . $row->order_id ?>" class="btn btn-sm btn-success" title="Terima">Terima</a>
                                <a href="<?= base_url('admin-hapus-pesanan/') . $row->order_id ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="if (!confirm('apa kamu yakin?')) {return false;}">Tolak</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Data Pesanan Kosong</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<a href="<?php echo base_url('admin-tambah-katalog') ?>"class="btn btn-outline-primary btn-fw my-3">Tambah Katalog</a>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th> No </th>
                <th> Gambar </th>
                <th> Nama Paket </th>
                <th> Harga </th>
                <th> Status </th>
                <th> Aksi </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if(!empty($getAllKatalog)):
            foreach($getAllKatalog as $row):
            ?>
            <tr>
                <td class='text-center'><?= $no++; ?></td>
                <td class='text-center'>
                    <a href="<?= base_url('assets/files/katalog/').$row->image; ?>" target='_blank'>
                        <img src="<?= base_url('assets/files/katalog/').$row->image; ?>" class="img-fluid" style="border-radius:10%;width:60px;height:60px;" alt="gambar">
                    </a>
                </td>
                <td><?= $row->package_name; ?></td>
                <td><?= number_format($row->price,2, ",",".") ?></td>
                <td><?= $row->status_publish; ?></td>
                <td>
                <a href="<?= base_url('admin-edit-katalog/').$row->catalogue_id ?>" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                <a href="<?= base_url('admin-hapus-katalog/').$row->catalogue_id ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="if (!confirm('apa kamu yakin?')) {return false;}">Hapus</a>                    
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else:?>
                <tr>
                    <td colspan="6" class="text-center">Data Katalog Kosong</td>
                </tr>
                <?php endif; ?>
        </tbody>
    </table>
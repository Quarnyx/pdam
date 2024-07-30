<table id="tabel-data" class="table table-bordered table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Koda Kas</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Operator</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";
        $query = mysqli_query($conn, "SELECT
kas.kode_kas,
kas.tanggal,
kas.keterangan,
kas.debit,
kas.kredit,
kas.kode_user,
`user`.nama_user
FROM
`user`
INNER JOIN kas ON kas.kode_user = `user`.kode_user WHERE debit > 0 ORDER BY kode_kas DESC");
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $data['kode_kas'] ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['keterangan'] ?></td>
                <td><?= "Rp. " . number_format($data['debit'], 0, ',', '.') ?></td>
                <td><?= $data['nama_user'] ?></td>
                <td>
                    <button data-id="<?= $data['kode_kas'] ?>" id="edit" type="button" class="btn btn-primary">Edit</button>
                    <button data-id="<?= $data['kode_kas'] ?>" id="delete" type="button"
                        class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#tabel-data').DataTable();
        $('#tabel-data').on('click', '#edit', function () {
            const id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: 'page/kas-masuk/edit-kas-masuk.php',
                data: 'kode_kas=' + id,
                success: function (data) {
                    $('.modal').modal('show');
                    $('#judul-modal').html('Edit Data Transaksi');
                    $('.modal .modal-body').html(data);
                }
            })
        });
        $('#tabel-data').on('click', '#delete', function () {
            const id = $(this).data('id');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus transaksi ini ?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?act=hapus-kas-masuk',
                    data: 'id=' + id,
                    success: function (data) {
                        loadTabel();
                        // alertify pesan sukses
                        alertify.success('Pengguna Berhasil Dihapus');
                    },
                    error: function (data) {
                        alertify.error(data);
                    }
                })
            }, function () {
                alertify.error('Hapus dibatalkan');
            })
        });
    });
</script>
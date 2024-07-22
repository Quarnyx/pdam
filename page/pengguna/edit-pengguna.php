<?php
$kode_user = $_POST['id'];

require_once ('../../config.php');

$query = mysqli_query($conn, "SELECT * FROM user WHERE kode_user='$kode_user'");
$data = mysqli_fetch_array($query);
?>
<form id="edit-pengguna" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['kode_user'] ?>">
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Nama</label>
                <input type="text" id="simpleinput" class="form-control" name="nama_user"
                    value="<?= $data['nama_user'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username"
                    value="<?= $data['username'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Alamat</label>
                <input type="text" name="alamat_user" class="form-control" placeholder="Alamat"
                    value="<?= $data['alamat_user'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">No. HP</label>
                <input type="text" name="telpon_user" class="form-control" placeholder="No. HP"
                    value="<?= $data['telpon_user'] ?>">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Level</label>
                <select class="form-select" name="level">
                    <option value="Admin" <?php if ($data['level'] == 'Admin') {
                        echo 'selected';
                    } ?>>Admin</option>
                    <option value="Kasir" <?php if ($data['level'] == 'Kasir') {
                        echo 'selected';
                    } ?>>Kasir</option>
                </select>
            </div>
            <!-- upload gambar -->
            <div class="mb-3">

                <label class="form-label">Upload Gambar</label>
                <input type="file" name="gambar" class="form-control" placeholder="Upload Gambar">
                <div class="mb-3 mt-3">
                    <img src="data:image/jpeg;base64,<?= base64_encode($data['gambar']) ?>" alt="" width="150px"
                        height="150px">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<script>
    $("#edit-pengguna").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?act=edit-pengguna',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".modal").modal('hide');
                loadTabel();
                // alertify pesan sukses
                alertify.success('Pengguna Berhasil Diedit');

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>
<?php
require_once ('../../config.php');

$sql = "SELECT * FROM kategori WHERE kode_kategori = '$_POST[id]'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<form id="edit-kategori" enctype="multipart/form-data">
    <input type="hidden" name="kode_kategori" value="<?php echo $data['kode_kategori'] ?>">
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Nama Kategori</label>
                <input type="text" id="simpleinput" class="form-control" name="nama_kategori"
                    value="<?php echo $data['nama_kategori'] ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $("#edit-kategori").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?act=edit-kategori',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".modal").modal('hide');
                loadTabel();
                // alertify pesan sukses
                alertify.success('Kategori Berhasil Diedit');

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>
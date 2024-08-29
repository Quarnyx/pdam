<?php
require_once('../../config.php');

$sql = "SELECT * FROM rekening WHERE kode_rekening = '$_POST[id]'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<form id="edit-rekening" enctype="multipart/form-data">
    <input type="hidden" name="kode_rekening" value="<?php echo $data['kode_rekening'] ?>">
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Nama Akun</label>
                <input type="text" id="simpleinput" class="form-control" name="nama_akun"
                    value="<?= $data['nama_akun'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" class="form-control" placeholder=""
                    value="<?= $data['nomor_rekening'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Kode Akun</label>
                <input type="text" name="nomor_akun" class="form-control" placeholder=""
                    value="<?= $data['nomor_akun'] ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Atas Nama</label>
                <input type="text" name="nama_rekening" class="form-control" placeholder=""
                    value="<?= $data['nama_rekening'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jenis Akun</label>
                <select name="jenis_akun" class="form-select">
                    <option value="">-- Pilih Jenis Akun --</option>
                    <option value="Aset" <?= $data['jenis_akun'] == 'Aset' ? 'selected' : '' ?>>Aset</option>
                    <option value="Kewajiban" <?= $data['jenis_akun'] == 'Kewajiban' ? 'selected' : '' ?>>Kewajiban
                    </option>
                    <option value="Pedapatan" <?= $data['jenis_akun'] == 'Pedapatan' ? 'selected' : '' ?>>Pedapatan
                    </option>
                    <option value="Beban" <?= $data['jenis_akun'] == 'Beban' ? 'selected' : '' ?>>Beban</option>
                    <option value="Modal" <?= $data['jenis_akun'] == 'Modal' ? 'selected' : '' ?>>Modal</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
</form>

<script>
    $("#edit-rekening").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?act=edit-rekening',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".modal").modal('hide');
                loadTabel();
                // alertify pesan sukses
                alertify.success('Rekening Berhasil Diedit');

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>
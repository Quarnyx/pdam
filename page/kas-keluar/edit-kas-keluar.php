<form id="tambah-kas-masuk" enctype="multipart/form-data">
    <?php
    require_once ('../../config.php');
    session_start();
    $kode_kas = $_POST['kode_kas'];
    $sql = "SELECT * FROM kas WHERE kode_kas = '$kode_kas'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    ?>
    <input type="hidden" name="id" value="<?php echo $_SESSION['kode_user'] ?>">

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Kode Kas</label>
                <input type="text" id="simpleinput" class="form-control" name="kode_kas"
                    value="<?php echo $data['kode_kas'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Keterangan</label>
                <input type="text" id="simpleinput" class="form-control" name="keterangan"
                    value="<?php echo $data['keterangan'] ?>">
            </div>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Tanggal</label>
                <input type="date" id="simpleinput" class="form-control" name="tanggal"
                    value="<?php echo $data['tanggal'] ?>">
            </div>

        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Jenis</label>
                <input type="text" id="simpleinput" class="form-control" name="jenis" value="Pengeluaran" readonly>
            </div>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Jumlah</label>
                <input type="number" id="simpleinput" class="form-control" name="jumlah"
                    value="<?php echo $data['kredit'] ?>">
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
    $("#tambah-kas-masuk").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?act=edit-kas-keluar',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".modal").modal('hide');
                loadTabel();
                // alertify pesan sukses
                alertify.success('Pengguna Berhasil Ditambah');

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>
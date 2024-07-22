<form id="tambah-kas-keluar" enctype="multipart/form-data">
    <?php
    session_start();

    ?>
    <input type="hidden" name="id" value="<?php echo $_SESSION['kode_user'] ?>">
    <?php
    require_once ('../../config.php');

    // generate kode kas
    $query = mysqli_query($conn, "SELECT MAX(kode_kas) AS kode_kas FROM kas");
    $data = mysqli_fetch_array($query);
    $max = $data['kode_kas'] ? substr($data['kode_kas'], 1, 3) : "000";
    $no = $max + 1;
    $char = "K";
    $kode = $char . sprintf("%03s", $no);
    ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Kode Kas</label>
                <input type="text" id="simpleinput" class="form-control" name="kode_kas" value="<?php echo $kode; ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Keterangan</label>
                <input type="text" id="simpleinput" class="form-control" name="keterangan">
            </div>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Tanggal</label>
                <input type="date" id="simpleinput" class="form-control" name="tanggal">
            </div>

        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Jenis</label>
                <input type="text" id="simpleinput" class="form-control" name="jenis" value="Pengeluaran" readonly>
            </div>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Jumlah</label>
                <input type="number" id="simpleinput" class="form-control" name="jumlah">
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
    $("#tambah-kas-keluar").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?act=tambah-kas-keluar',
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
<form id="tambah-rekening" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Nama Bank</label>
                <input type="text" id="simpleinput" class="form-control" name="nama_bank">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-lg-6">

            <div class="mb-3">
                <label for="" class="form-label">Nama Akun</label>
                <input type="text" name="nama_rekening" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
</form>

<script>
    $("#tambah-rekening").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?act=tambah-rekening',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".modal").modal('hide');
                loadTabel();
                // alertify pesan sukses
                alertify.success('Rekening Berhasil Ditambah');

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>
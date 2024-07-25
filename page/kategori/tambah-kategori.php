<form id="tambah-kategori" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Nama Kategori</label>
                <input type="text" id="simpleinput" class="form-control" name="nama_kategori">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
</form>

<script>
    $("#tambah-kategori").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?act=tambah-kategori',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".modal").modal('hide');
                loadTabel();
                // alertify pesan sukses
                alertify.success('kategori Berhasil Ditambah');

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>
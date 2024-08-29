<form id="tambah-rekening" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Nama Akun</label>
                <input type="text" id="simpleinput" class="form-control" name="nama_akun">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" class="form-control" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Kode Akun</label>
                <input type="text" name="nomor_akun" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">Atas Nama</label>
                <input type="text" name="nama_rekening" class="form-control" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jenis Akun</label>
                <select name="jenis_akun" class="form-select">
                    <option value="">-- Pilih Jenis Akun --</option>
                    <option value="Aset">Aset</option>
                    <option value="Kewajiban">Kewajiban</option>
                    <option value="Pedapatan">Pedapatan</option>
                    <option value="Beban">Beban</option>
                    <option value="Modal">Modal</option>
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
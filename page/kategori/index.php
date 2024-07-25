<!-- Start Content-->
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Data Kategori</h4>
        </div>

        <div>
            <button id="tambah" type="button" class="btn btn-success">Tambah Kategori</button>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Data Kategori</h5>
                </div><!-- end card header -->

                <div class="card-body" id="tabel">

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function loadTabel() {
        $('#tabel').load('page/kategori/tabel-kategori.php');
    }
    $(document).ready(function () {
        loadTabel();

        $('#tambah').click(function () {
            // unhide modal
            $('.modal').modal('show');
            $('#judul-modal').html('Tambah Kategori Baru');
            // load form
            $('.modal-body').load('page/kategori/tambah-kategori.php');
        })
    })
</script>
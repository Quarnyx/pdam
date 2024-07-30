<!-- Start Content-->
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Laporan Kas Keluar</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Filter Tanggal</h5>
                </div><!-- end card header -->
                <?php
                function tanggal($tanggal)
                {
                    $bulan = array(
                        1 => 'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
                    $split = explode('-', $tanggal);
                    return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
                }
                $daritanggal = "";
                $sampaitanggal = "";

                if (isset($_GET['dari_tanggal']) && isset($_GET['sampai_tanggal'])) {
                    $daritanggal = $_GET['dari_tanggal'];
                    $sampaitanggal = $_GET['sampai_tanggal'];
                }

                ?>
                <div class="card-body">
                    <form action="" method="get" class="row g-3">
                        <input type="hidden" name="page" value="laporan-kas-masuk">
                        <div class="col-md-6">
                            <label for="validationDefault01" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" id="validationDefault01" required=""
                                name="dari_tanggal">
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="validationDefault02" required=""
                                name="sampai_tanggal">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Pilih</button>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Laporan Kas Keluar Periode <?php
                    if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) {
                        echo tanggal($_GET['dari_tanggal']) . " s.d " . tanggal($_GET['sampai_tanggal']);
                    } else {
                        echo "Semua";
                    }
                    ?></h5>
                </div><!-- end card header -->

                <div class="card-body" id="tabel">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // include database
                            $kondisi = "";

                            if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"]))
                                $kondisi = "AND date(tanggal) between '" . $_GET['dari_tanggal'] . "' and '" . $_GET['sampai_tanggal'] . "'";

                            $sql = "SELECT * FROM kas WHERE kredit > 0 $kondisi ORDER BY tanggal asc";
                            $hasil = mysqli_query($conn, $sql);
                            $no = 0;
                            $status = '';
                            $total = 0;

                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                                $no++;
                                if ($data['tanggal'] == '0000-00-00') {
                                    $tanggal = "";
                                } else {
                                    $tanggal = date("d/m/Y", strtotime($data['tanggal']));
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td><?= tanggal($data['tanggal']) ?></td>
                                    <td><?= $data['keterangan'] ?></td>
                                    <td><?= "Rp. " . number_format($data['kredit'], 0, ',', '.') ?></td>
                                </tr>
                                <!-- bagian akhir (penutup) while -->
                                <?php
                                $total += $data['kredit'];
                            endwhile;
                            ?>

                            <td colspan="3" class="text-center"><b>Total</b">
                            </td>
                            <td><b><?php echo "Rp. " . number_format($total, 0, ',', '.') ?></b></td>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <div class="col-4">

            <a href="page/laporan/cetak-kas-keluar.php?dari_tanggal=<?php echo $daritanggal ?>&sampai_tanggal=<?php echo $sampaitanggal ?>"
                target="_blank" class="btn btn-success" type="button">Cetak</a>
        </div>

    </div>
</div>
<script>

</script>
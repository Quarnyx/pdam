<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Custom styles for this template -->
    <link href="../../assets/css/app.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <?php
    include '../../config.php';

    ?>
    <div class="container-fluid">

        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-3 text-end">
                    <img src="../../assets/images/pdam.png" width="100px" alt="brand" />
                </div>
                <div class="col-sm-8 text-center">
                    <h3>LAPORAN KAS BESAR</h3>
                    <h3><b>PDAM "TIRTO PANGURIPAN" KENDAL</b></h3>
                    <h6>Cabang Kaliwungu 1</h6>
                </div>
            </div>
        </div>
        <hr>
        <div class="">
            <!--rows -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="mb-3 text-center"><b>Laporan Kas Masuk</b> <br> Periode : <?php
                    if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) {
                        echo tanggal($_GET['dari_tanggal']) . " s.d " . tanggal($_GET['sampai_tanggal']);
                    } else {
                        echo "Semua";
                    }
                    ?>
                    </h4>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                            $sql = "SELECT * FROM kas WHERE jenis='pemasukan' $kondisi ORDER BY tanggal asc";
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
                                    <td><?= "Rp. " . number_format($data['debit'], 0, ',', '.') ?></td>
                                </tr>
                                <!-- bagian akhir (penutup) while -->
                                <?php
                                $total += $data['debit'];
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
    </div>

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
    ?>

    <div class="mt-3" style="text-align:end;">
        <hr>
        <p class="font-weight-bold">Kaliwungu, <?= tanggal(date('Y-m-d')) ?><br>Mengetahui,</p>
        <div class="mt-5">
            <p class="font-weight-bold">Kepala Cabang PDAM Kaliwungu</p>
        </div>
    </div>
</body>
<script>

    window.print();
    window.onafterprint = window.close;
</script>

</html>
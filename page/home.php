<!-- Start Content-->
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
        </div>
    </div>

    <!-- start row -->
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="row g-3">

                <div class="col-md-6 col-xl-4">

                    <div class="card text-bg-primary">
                        <?php
                        require_once ('config.php');
                        $sql = "SELECT SUM(debit) - SUM(kredit) AS total FROM kas";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total = $row['total'];
                        ?>
                        <div class="card-header">
                            <h4 class="card-title mb-0">Total Kas</h4>
                        </div>
                        <div class="card-body">
                            <div class="fs-22 mb-0 me-2 fw-semibold text-white">Rp
                                <?php echo number_format($total, 0, ',', '.'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card text-bg-success">
                        <?php
                        $sql = "SELECT SUM(debit) AS total FROM kas WHERE tanggal=CURDATE()";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $totalpemasukan = $row['total'];
                        ?>
                        <div class="card-header">
                            <h4 class="card-title mb-0">Pemasukan Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            <div class="fs-22 mb-0 me-2 fw-semibold text-white">
                                Rp <?php echo number_format($totalpemasukan, 0, ',', '.'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">

                    <div class="card text-bg-danger">
                        <?php
                        $sql = "SELECT SUM(kredit) AS total FROM kas WHERE tanggal=CURDATE()";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $totalpengeluaran = $row['total'];
                        ?>
                        <div class="card-header">
                            <h4 class="card-title mb-0">Pengeluaran Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            <div class="fs-22 mb-0 me-2 fw-semibold text-white">Rp
                                <?php echo number_format($totalpengeluaran, 0, ',', '.'); ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div> <!-- end sales -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="row g-3">

                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1 text-muted">Pemasukan Bulan Ini</div>
                                    </div>
                                    <?php

                                    $sql = "SELECT SUM(debit) AS total FROM kas WHERE MONTH(tanggal) = MONTH(CURDATE())";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $totalpemasukan = $row['total'];

                                    ?>

                                    <div class="d-flex align-items-baseline mb-0">
                                        <div class="fs-20 mb-0 me-2 fw-semibold text-dark">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 d-flex justify-content-center align-items-center">
                                    <div id="new-orders" class="apex-charts"></div>
                                </div>
                            </div>
                            <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                <span class="fs-20 mb-0 me-2 fw-semibold text-primary">
                                    Rp <?php echo number_format($totalpemasukan, 0, ',', '.'); ?>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1 text-muted">Pengeluaran Bulan Ini</div>
                                    </div>
                                    <?php
                                    $sql = "SELECT SUM(kredit) AS total FROM kas WHERE MONTH(tanggal) = MONTH(CURDATE())";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $totalpengeluaran = $row['total'];
                                    ?>
                                    <div class="d-flex align-items-baseline mb-0">
                                        <div class="fs-20 mb-0 me-2 fw-semibold text-dark"></div>
                                    </div>
                                </div>

                                <div class="col-6 d-flex justify-content-center align-items-center">
                                    <div id="sales-report" class="apex-charts"></div>
                                </div>
                            </div>

                            <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                <span class="fs-20 mb-0 me-2 fw-semibold text-danger">
                                    Rp <?php echo number_format($totalpengeluaran, 0, ',', '.'); ?>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1 text-muted">Pemasukan Tahun Ini</div>
                                    </div>
                                    <?php

                                    $sql = "SELECT SUM(debit) AS total FROM kas WHERE YEAR(tanggal) = YEAR(CURDATE())";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $totalpemasukan = $row['total'];

                                    ?>
                                    <div class="d-flex align-items-baseline mb-0">
                                        <div class="fs-20 mb-0 me-2 fw-semibold text-dark"></div>
                                    </div>
                                </div>

                                <div class="col-6 d-flex justify-content-center align-items-center">
                                    <div id="revenue" class="apex-charts"></div>
                                </div>
                            </div>

                            <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                <span class="fs-20 mb-0 me-2 fw-semibold text-success">
                                    Rp <?php echo number_format($totalpemasukan, 0, ',', '.'); ?>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1 text-muted">Pengeluaran Tahun Ini</div>
                                    </div>
                                    <?php
                                    $sql = "SELECT SUM(kredit) AS total FROM kas WHERE YEAR(tanggal) = YEAR(CURDATE())";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $totalpengeluaran = $row['total'];
                                    ?>
                                    <div class="d-flex align-items-baseline mb-0">
                                        <div class="fs-20 mb-0 me-2 fw-semibold text-dark"></div>
                                    </div>
                                </div>

                                <div class="col-6 d-flex justify-content-center align-items-center">
                                    <div id="expenses" class="apex-charts"></div>
                                </div>
                            </div>

                            <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                <span class="fs-20 mb-0 me-2 fw-semibold text-primary">
                                    Rp <?php echo number_format($totalpengeluaran, 0, ',', '.'); ?>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- end sales -->
    </div> <!-- end row --></script>

    <!-- Start Monthly Sales -->
    <div class="row">
        <div class="col-md-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                            <i data-feather="git-commit" class="widgets-icons"></i>
                        </div>
                        <h5 class="card-title mb-0">Grafik Transaksi</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div id="chart-kas" class="apex-charts"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                            <i data-feather="git-commit" class="widgets-icons"></i>
                        </div>
                        <h5 class="card-title mb-0">Total Transaksi per Kategori</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div id="multiple_radialbar_chart" class="apex-charts"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Monthly Sales -->
    <div class="row">
        <div class="col-md-6 col-xl-6">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                            <i data-feather="tablet" class="widgets-icons"></i>
                        </div>
                        <h5 class="card-title mb-0">Transaksi Terbaru</h5>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-traffic mb-0">
                            <tbody>
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Jenis</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * FROM kas ORDER BY tanggal DESC LIMIT 5";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <tr>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td><?php if ($row['debit'] > 0)
                                                echo 'Pemasukan';
                                            else
                                                echo 'Pengeluaran';
                                            echo ' ' ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['debit'] > 0) {
                                                    echo 'Rp ' . number_format($row['debit'], 0, ',', '.');
                                                } else {
                                                    echo 'Rp ' . number_format($row['kredit'], 0, ',', '.');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                            <i data-feather="tablet" class="widgets-icons"></i>
                        </div>
                        <h5 class="card-title mb-0">Saldo Rekening</h5>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-traffic mb-0">
                            <tbody>
                                <thead>
                                    <tr>
                                        <th>Bank</th>
                                        <th>Nama Rekening</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT
	rekening.nama_bank, 
	rekening.nama_rekening, 
	SUM(kas.debit) - SUM(kas.kredit) AS total
FROM
	kas
	INNER JOIN
	rekening
	ON 
		kas.kode_rekening = rekening.kode_rekening
		GROUP BY nama_rekening";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <tr>
                                            <td><?= $row['nama_bank'] ?></td>
                                            <td><?= $row['nama_rekening'] ?></td>
                                            <td>
                                                <?php echo "Rp. " . number_format($row['total'], 0, ',', '.') ?>

                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/pages/ecommerce-dashboard.init.js"></script>



    <?php
    require_once ('config.php');
    $sql = "SELECT 
    DATE_FORMAT(tanggal, '%Y-%m') AS month,
    SUM(debit) AS income,
    SUM(kredit) AS expense
FROM kas
WHERE YEAR(tanggal) = YEAR(CURDATE())
GROUP BY month
ORDER BY month;
";

    $result = $conn->query($sql);

    // Initialize data structure for all months of the current year
    $months = array();
    $monthNames = [
        '01' => 'Jan',
        '02' => 'Feb',
        '03' => 'Mar',
        '04' => 'Apr',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agu',
        '09' => 'Sept',
        '10' => 'Okt',
        '11' => 'Nov',
        '12' => 'Des'
    ];

    for ($i = 1; $i <= 12; $i++) {
        $month = date('Y') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
        $months[$month] = ['income' => 0, 'expense' => 0];
    }

    // Map fetched results to the initialized structure
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $months[$row['month']]['income'] = $row['income'] ? $row['income'] : 0;
            $months[$row['month']]['expense'] = $row['expense'] ? $row['expense'] : 0;
        }
    }

    $incomeData = array_map(function ($m) {
        return $m['income'];
    }, $months);
    $expenseData = array_map(function ($m) {
        return $m['expense'];
    }, $months);
    $categories = array_map(function ($m) use ($monthNames) {
        return $monthNames[substr($m, 5, 2)];
    }, array_keys($months));




    ?>

</div> <!-- container-fluid a-->
<script>
    const categories = <?php echo json_encode($categories); ?>;
    const incomeData = <?php echo json_encode(array_values($incomeData)); ?>;
    const expenseData = <?php echo json_encode(array_values($expenseData)); ?>;
    console.log(incomeData);
    console.log(expenseData);
    console.log(categories);
    var options = {
        chart: {
            type: "bar",
            height: 350,
            stacked: !0,
            parentHeightOffset: 0,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !0
            }
        },
        series: [{
            name: "Pemasukan",
            data: incomeData
        }, {
            name: "Pengeluaran",
            data: expenseData
        }],
        plotOptions: {
            bar: {
                horizontal: !1,
                borderRadius: 5,
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "last",
                columnWidth: "40%",
                dataLabels: {
                    total: {
                        style: {
                            fontSize: "13px",
                            fontWeight: 900
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: !1
        },
        xaxis: {
            categories: categories,
            axisBorder: {
                show: !1
            }
        },
        yaxis: {
            labels: {
                padding: 4
            }
        },
        colors: ["#537AEF", "#dee2e6"],
        legend: {
            position: "top",
            show: !0,
            horizontalAlign: "right"
        },
        fill: {
            opacity: 1
        },
        grid: {
            padding: {
                top: -20,
                right: 0,
                bottom: 0
            },
            strokeDashArray: 4,
            xaxis: {
                lines: {
                    show: !0
                }
            }
        }
    };
    (chart = new ApexCharts(document.querySelector("#chart-kas"), options)).render();
</script>
<?php
// cari per kategori

$sqlk = "SELECT
	kas.kode_kategori,
	kategori.nama_kategori,
    kas.tanggal,
	SUM( kas.debit ) + SUM( kas.kredit ) AS subtotal 
FROM
	kas
	INNER JOIN kategori ON kas.kode_kategori = kategori.kode_kategori 
    WHERE MONTH(kas.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(kas.tanggal) = YEAR(CURRENT_DATE())
GROUP BY
	nama_kategori
    ";

$resultk = $conn->query($sqlk);
$kategori = array();
while ($datak = $resultk->fetch_assoc()) {
    $kategori[] = array(
        'kode_kategori' => $datak['kode_kategori'],
        'nama_kategori' => $datak['nama_kategori'],
        'subtotal' => $datak['subtotal']
    );
}

$namaKategori = array_column($kategori, 'nama_kategori');
$subtotal = array_column($kategori, 'subtotal');


$conn->close();

?>
<script>

    const namaKategori = <?php echo json_encode($namaKategori); ?>;
    const subtotal = <?php echo json_encode(array_values($subtotal)); ?>;
    subtotal.forEach((item, index) => {
        subtotal[index] = Number(item);
    });
    console.log(subtotal);
    const total = subtotal.reduce((a, b) => a + b, 0);
    const percentages = subtotal.map(item => (item / total) * 100);

    percentages.forEach((item, index) => {
        percentages[index] = Number(item.toFixed(2));
    });


    console.log(percentages);

    console.log(total);

    var options = {
        series: percentages,
        chart: { height: 350, type: "radialBar", parentHeightOffset: 0 },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: { fontSize: "22px" },
                    value: { fontSize: "16px" },
                    total: {
                        show: !0,
                        label: "Total",
                        formatter: function (e) {
                            return "Rp. " + total.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");

                        },
                    },
                },
            },
        },
        labels: namaKategori,
    };
    (chart = new ApexCharts(
        document.querySelector("#multiple_radialbar_chart"),
        options
    )).render();
</script>